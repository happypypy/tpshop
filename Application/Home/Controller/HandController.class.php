<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 商品推手
 * Class HandController
 * @package Home\Controller
 */
class HandController extends Controller {

    public function index(){
        $id=6;
        $img=M('member')->where("uid=$id")->getfield('codepic');
        if($img){
            $this->assign('img',$img);
        }else{
            $pic=M('member')->where("uid=$id")->getfield('pic');
            $this->code($id,$pic);
            $data['codepic'] = "{$id}.png";
            M('member')->where("uid=$id")->data($data)->save();
            $this->img="{$id}.png";
        }
        $this->display();
    }

    /**
     * 生成二维码
     */
    public function code($id,$pic){
        Vendor('phpqrcode.phpqrcode');//这个很重要，没引用则不能使用
        $value = "http://www.baibu.cn?id={$id}"; //二维码内容
        $errorCorrectionLevel = 'L';//容错级别
        $matrixPointSize = 6;//生成图片大小
        //生成二维码图片
        \QRcode::png($value,"./Public/code/{$id}.png", $errorCorrectionLevel, $matrixPointSize, 2);
        $logo = "./Public/Upload/headpic/$pic";//准备好的logo图片
        $QR = "./Public/code/{$id}.png";//已经生成的原始二维码图
        if ($logo !== FALSE) {
            $QR = imagecreatefromstring(file_get_contents($QR));
            $logo = imagecreatefromstring(file_get_contents($logo));
            $QR_width = imagesx($QR);//二维码图片宽度
            $QR_height = imagesy($QR);//二维码图片高度
            $logo_width = imagesx($logo);//logo图片宽度
            $logo_height = imagesy($logo);//logo图片高度
            $logo_qr_width = $QR_width/5;
            $scale = $logo_width/$logo_qr_width;
            $logo_qr_height = $logo_height/$scale;
            $from_width = ($QR_width - $logo_qr_width)/2;
            //重新组合图片并调整大小
            imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        }
        //保存图片
        return imagepng($QR, "./Public/code/{$id}.png");
    }
}