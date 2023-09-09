<?php


namespace App\Interfaces;

interface PromotionRepositryInterface
{
    public function create();
    public function allPromotion();
    public function storePromotion($request);
    public function graduateStudent($id);
    public function deletePromotion($id, $stu_id);
    public function deleteAllPromotion();
}
