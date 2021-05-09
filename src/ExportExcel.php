<?php

namespace AsyncExport;

/**
 * 异步导出
 *
 * Class AsyncExportService
 * @package App\Services\Center
 */
class ExportExcel
{
    protected $importSN;

    public function setImportSN($importSN)
    {
        return $this->importSN = $importSN;
    }

    /**
     * 发起异步导出
     * @param $className
     * @param $funName
     * @param $param
     * @return mixed
     */
    public static function exportAsyncCreate($className, $funName, $param){
//        $data = Uuid::uuid1();
//        $importSN = $data->getHex();    //32位字符串方法
//
//        $status = [
//            'step' => '1',
//            'progressRate' => 0,
//            'message' => '',
//            'info' => [],
//        ];
//
//        Redis::SETEX('magpie:exportHandledEntry:' . $importSN, 86400, json_encode($status, JSON_UNESCAPED_UNICODE));
//
//        dispatch(new DownloadExcelJob($className, $funName, $importSN, $param));
//
//        return $importSN;
        $importSN = time();

        return $importSN . $className . $funName . $param;
    }

    /**
     * 异步生成文件状态
     * @param Request $request
     * @return array
     * @author: LiJunJie
     * @date: 2020/8/25
     */
    public static function exportGeneralHandledStatus($request)
    {
//        $status = Redis::get('magpie:exportHandledEntry:' . $request->importSN);
//        if ($status){
//            $status = json_decode($status, true);
//
//            return [
//                'step' => $status['step'],
//                'progressRate' => $status['progressRate'],
//                'message' => $status['message'],
//            ];
//        }
            return [
                'step' => '',
                'progressRate' => '',
                'message' => '',
            ];
    }

    /**
     * 导出异步生成的文件
     * @param Request $request
     * @return mixed
     * @author: LiJunJie
     * @date: 2020/8/25
     */
    public static function exportGeneralHandledFile($request)
    {
//        $status = Redis::get('magpie:exportHandledEntry:' . $request->importSN);
//
//        if (isset($status)){
//            if (mt_rand(1, 50) == 1){
//                $directories = Storage::directories('exports/');
//                if($directories) foreach ($directories as $dir){
//                    $dirDate = explode('/', $dir)[1];
//                    $dirDate = new Carbon($dirDate);
//                    $diffDays = Carbon::today()->diffInDays($dirDate);
//                    if ($diffDays > 3){
//                        Storage::deleteDirectory($dir);
//                    }
//                }
//            }
//
//            $status = json_decode($status, true);
//
//            if ($status['step'] == 3){
//                Redis::del('magpie:exportHandledEntry:' . $request->importSN);
//
//                return $status['info']['excelName'];
//            }
//        }
        return 'exportGeneralHandledFile';
    }

    /**
     * 导出进度
     * @author: LiJunJie
     * @date: 2020/8/27
     */
    public function exportProgressRate(int $hiringFormIndex, int $totalNum, $message = '')
    {
//        if(mt_rand(1,500) == 1){
//            $status = [
//                'step' => 2, // 文件准备处理
//                'progressRate' => (int)($hiringFormIndex / $totalNum * 100),
//                'message' => $message,
//                'info' => [],
//            ];
//            Redis::SETEX('magpie:exportHandledEntry:' . $this->importSN, 86400, json_encode($status, JSON_UNESCAPED_UNICODE));
//        }
        return 'exportProgressRate';
    }
}
