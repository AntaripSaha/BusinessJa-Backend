<?php
/*
 * File name: EServiceReviewAPIController.php
 * Last modified: 2021.02.22 at 10:53:38
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\API;


use App\Criteria\EServiceReviews\EServiceReviewsOfUserCriteria;
use App\Http\Controllers\Controller;
use App\Http\Resources\EproviderReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Models\EService;
use App\Models\EServiceReview;
use App\Repositories\EServiceReviewRepository;
use Dotenv\Result\Success;
use GuzzleHttp\Psr7\Message;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Http\Resources\Json\ResourceCollection;


/**
 * Class EServiceReviewController
 * @package App\Http\Controllers\API
 */
class EServiceReviewAPIController extends Controller
{
    /** @var  EServiceReviewRepository */
    private $eServiceReviewRepository;

    public function __construct(EServiceReviewRepository $eServiceReviewRepo)
    {
        $this->eServiceReviewRepository = $eServiceReviewRepo;
    }

    /**
     * Display a listing of the EServiceReview.
     * GET|HEAD /eServiceReviews
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $this->eServiceReviewRepository->pushCriteria(new RequestCriteria($request));
            if (auth()->check()) {
                $this->eServiceReviewRepository->pushCriteria(new EServiceReviewsOfUserCriteria(auth()->id()));
            }
            $this->eServiceReviewRepository->pushCriteria(new LimitOffsetCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $eServiceReviews = $this->eServiceReviewRepository->all();
        $this->filterCollection($request, $eServiceReviews);

        return $this->sendResponse($eServiceReviews->toArray(), 'E Service Reviews retrieved successfully');
    }

    /**
     * Display the specified EServiceReview.
     * GET|HEAD /eServiceReviews/{id}
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function show(int $id, Request $request): JsonResponse
    {
        try {
            $this->eServiceReviewRepository->pushCriteria(new RequestCriteria($request));
            $this->eServiceReviewRepository->pushCriteria(new LimitOffsetCriteria($request));

        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $eServiceReview = $this->eServiceReviewRepository->findWithoutFail($id);
        if (empty($eServiceReview)) {
            return $this->sendError(__('lang.not_found', ['operator' => __('lang.e_service_review')]));
        }
        $this->filterModel($request, $eServiceReview);

        return $this->sendResponse($eServiceReview->toArray(), 'E Service Review retrieved successfully');
    }

    /**
     * Store a newly created Review in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
         $validated = $request->validate([
                'rate' => 'required'
            ]);
        $uniqueInput = $request->only("user_id", "e_service_id");
        $otherInput = $request->except("user_id", "e_service_id");
        try {
            $review = $this->eServiceReviewRepository->updateOrCreate($uniqueInput, $otherInput);
        } catch (ValidatorException $e) {
            return $this->sendError(__('lang.not_found', ['operator' => __('lang.e_service_review')]));
        }

        return $this->sendResponse($review->toArray(), __('lang.saved_successfully', ['operator' => __('lang.e_service_review')]));
    }
    public function reviewstore(Request $request) 
    {
        // $validated = $request->validate([
        //     'rate' => 'required',
        //     'review' => 'required|max:255',
        // ]);
        try {
            $user_id = EServiceReview::where('user_id', $request->user_id)->where('e_provider_id', $request->e_provider_id)->pluck('id');

            if($user_id){
                return response()->json([
                    "data"=>$user_id,
                    "success"=>200,
                    "message"=>"You've already given a review"
                ]);
            }
            $review = new EServiceReview;
            $review->review =  $request->review;
            $review->rate =  $request->rate;
            $review->user_id =  $request->user_id;
            $review->e_provider_id =  $request->e_provider_id;
            $review->save();
            return response()->json([
                "success"=>200,
                "message"=>"data saved"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "success"=>404,
                "message"=>"Data Error"
            ]);
        }
       
    }
    public function get_user_reviews(Request $request) 
    {
        if($request->user_id && $request->e_provider_id){
            $user_id = EServiceReview::where('user_id', $request->user_id)->where('e_provider_id', $request->e_provider_id)->select('id', 'review', 'user_id', 'e_provider_id')->first();
            try {
                if($user_id){
                    return response()->json([
                        "success"=>200,
                        "data"=>$user_id,
                        "message"=>"Review Retrived Successfully"
                    ]);
                }else{
                    return response()->json([
                        "success"=>404,
                        "message"=>"No Data Found"
                    ]);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    "success"=>false,
                    "message"=>$th
                ]);
            }
        }else{
          $items = ReviewResource::collection(EServiceReview::where('user_id', $request->user_id)->with('eProvider')->get());
          return $this->success('Review Retrived Successfully',[
            'items'=>$items
          ]);
        }
    }
}
