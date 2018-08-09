<?php
namespace PHPExcel;

class ExampleExcel
{
    
    public function test(){

        include_once 'statics/js/PHPExcel/Classes/PHPExcel.php';//导入处理新闻列表的函
        include_once 'statics/js/PHPExcel/Classes/PHPExcel/IOFactory.php';
        include_once 'statics/js/PHPExcel/Classes/PHPExcel/Reader/Excel2007.php';
        include_once 'statics/js/PHPExcel/Classes/PHPExcel/Reader/Excel5.php';
        //include_once 'APP/model/export/model_export.php';//导入处理新闻列表的函数
        //开启session
        
        if (true)
        {
            $uploadfile="1.xlsx";
            if (true) {
        
                //  if($file_type == 'xlsx'){
                $PHPReader = new PHPExcel_Reader_Excel2007();
                //         }elseif($file_type == 'xls'){
                //             $PHPReader = new PHPExcel_Reader_Excel5();
                //         }
                $PHPExcel = $PHPReader->load($uploadfile); //读取文件
                $currentSheet = $PHPExcel->getSheet(0); //读取第一个工作簿
                $allColumn = $currentSheet->getHighestColumn(); // 所有列数
                $allRow = $currentSheet->getHighestRow();
                //         var_dump($allRow);
                //         exit;
                $data = array(); //下面是读取想要获取的列的内容
                for ($rowIndex = 4; $rowIndex <= $allRow; $rowIndex++)
                {
                    if($currentSheet->getCell('B'.$rowIndex)->getValue() == '' || $currentSheet->getCell('C'.$rowIndex)->getValue() == '' || $currentSheet->getCell('D'.$rowIndex)->getValue() == ''){
                        //continue;
                    }
                    $data[$rowIndex-3] = array(
                        //'ID' => $currentSheet->getCell('A'.$rowIndex)->getValue(),
                        'papercj' => $currentSheet->getCell('A'.$rowIndex)->getValue(),//生产车间
                        'paperjt' => $currentSheet->getCell('B'.$rowIndex)->getValue(),//生产机台
                        'officeadd' => $currentSheet->getCell('C'.$rowIndex)->getValue(),//办事处
                        'customersort' => $currentSheet->getCell('D'.$rowIndex)->getValue(),//客户简称
                        'papertype' => $currentSheet->getCell('E'.$rowIndex)->getValue(),
                        'paperpp' => $currentSheet->getCell('F'.$rowIndex)->getValue(),
                        'kezhong' => $currentSheet->getCell('G'.$rowIndex)->getValue(),
                        'prospec' => $currentSheet->getCell('H'.$rowIndex)->getValue(),
                        'paperbz' => $currentSheet->getCell('I'.$rowIndex)->getValue(),
                        'papercount' => $currentSheet->getCell('J'.$rowIndex)->getValue(),
                        'paperused' => $currentSheet->getCell('K'.$rowIndex)->getValue(),
                        'paperdj' => $currentSheet->getCell('L'.$rowIndex)->getValue(),
                        'remark' => $currentSheet->getCell('M'.$rowIndex)->getValue(),//时间可以为空
                        'paperaddno' => $currentSheet->getCell('N'.$rowIndex)->getValue(),
                        'ordertime' => $currentSheet->getCell('O'.$rowIndex)->getValue(),
        
                    );
                    //var_dump($data);
                    IF($rowIndex == 11){
                        BREAK;
                    }
                }
                var_dump($data);
                //插入数据库（存在删除之前信息的操作）
                //insert_sql($data,$file_id);
            }
        }
        
    }
}

?>