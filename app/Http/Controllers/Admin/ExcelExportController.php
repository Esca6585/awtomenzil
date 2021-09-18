<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

use Illuminate\Support\Facades\File;

use App\Models\Autocolumn;
use App\Models\Driver;

class ExcelExportController extends Controller
{
    public function autocolumnExcel()
    {
        if(Auth::user()->autocolumn_id == 12345){
            $autocolumns = Autocolumn::orderBy('id','desc')->get();
        } else {
            $autocolumns = Autocolumn::where('autocolumn_id', Auth::user()->autocolumn_id)->orderBy('id','desc')->get();
        }
        
        $drawing = new Drawing();
        
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Ady, Familiýasy we Atasynyň ady');
        $sheet->setCellValue('C1', 'Tabel Belgisi');
        $sheet->setCellValue('D1', 'Döwlet belgisi');
        $sheet->setCellValue('E1', 'Doglan güni we ýeri');
        $sheet->setCellValue('F1', 'Bilimi');
        $sheet->setCellValue('G1', 'Pasport belgisi, alynan wagty we ýeri');
        $sheet->setCellValue('H1', 'Telefon belgisi');
        $sheet->setCellValue('I1', ' Ýaşaýan salgysy');
        $sheet->setCellValue('J1', 'Suraty');
        
        $styleArray = array(
            'font' => array(
                'bold' => true
            )
        );

        $sheet->getStyle('A1')->applyFromArray($styleArray);
        $sheet->getStyle('B1')->applyFromArray($styleArray);
        $sheet->getStyle('C1')->applyFromArray($styleArray);
        $sheet->getStyle('D1')->applyFromArray($styleArray);
        $sheet->getStyle('E1')->applyFromArray($styleArray);
        $sheet->getStyle('F1')->applyFromArray($styleArray);
        $sheet->getStyle('G1')->applyFromArray($styleArray);
        $sheet->getStyle('H1')->applyFromArray($styleArray);
        $sheet->getStyle('I1')->applyFromArray($styleArray);
        $sheet->getStyle('J1')->applyFromArray($styleArray);
        
        foreach($autocolumns as $key => $autocolumn){
            

            $sheet->getColumnDimension('A')->setWidth(5, 'px');
            $sheet->getColumnDimension('B')->setWidth(50, 'px');
            $sheet->getColumnDimension('C')->setWidth(15, 'px');
            $sheet->getColumnDimension('D')->setWidth(50, 'px');
            $sheet->getColumnDimension('E')->setWidth(80, 'px');
            $sheet->getColumnDimension('F')->setWidth(20, 'px');
            $sheet->getColumnDimension('G')->setWidth(80, 'px');
            $sheet->getColumnDimension('H')->setWidth(20, 'px');
            $sheet->getColumnDimension('I')->setWidth(80, 'px');
            $sheet->getColumnDimension('J')->setWidth(15, 'px');

            $sheet->getRowDimension($key+2)->setRowHeight(100);
            
            $sheet->setCellValue('A' . (string)($key + 2), $key+1);
            $sheet->setCellValue('B' . (string)($key + 2), $autocolumn->driver->ady . ' ' . $autocolumn->driver->familiyasy . ' ' . $autocolumn->driver->atasynyn_ady);
            $sheet->setCellValue('C' . (string)($key + 2), $autocolumn->driver->tabel_belgisi);
            $sheet->setCellValue('D' . (string)($key + 2), $autocolumn->car->awtoulagyn_kysymy . ' ' . $autocolumn->car->awtoulagyn_gornushi . ' ' . $autocolumn->car->awtoulogyn_shahsy_belgisi);
            $sheet->setCellValue('E' . (string)($key + 2), $autocolumn->driver->doglan_guni . ' ' . $autocolumn->driver->doglan_yeri);
            $sheet->setCellValue('F' . (string)($key + 2), $autocolumn->driver->bilimi);
            $sheet->setCellValue('G' . (string)($key + 2), $autocolumn->driver->pasport_belgisi . ' ' . $autocolumn->driver->pasport_alynan_wagty . ' ' . $autocolumn->driver->pasport_alynan_yeri);
            $sheet->setCellValue('H' . (string)($key + 2), $autocolumn->driver->telefon_belgisi);
            $sheet->setCellValue('I' . (string)($key + 2), $autocolumn->driver->yashayan_salgysy);

            if(file_exists($autocolumn->driver->suraty)){
                $drawing = new Drawing();
                $drawing->setWorksheet($spreadsheet->getActiveSheet());                
                
                $drawing->setPath($autocolumn->driver->suraty); // put your path and image here
                $drawing->setCoordinates('J' . (string)($key + 2));
                $drawing->setWidth(100);
                $drawing->setHeight(100);

            } else {
                $sheet->setCellValue('J' . (string)($key + 2), 'Suraty ýok');
            }

        }
    
        $writer = new Xlsx($spreadsheet);

        $path = public_path().'/excel/awtotoplum-' . Auth::user()->autocolumn_id;

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        $excel_path = $path . '/awtotoplum-' . Auth::user()->autocolumn_id . '-(date-' . date('d-m-y') . ')(time-' . date('h_i_s') . ').xlsx';
        
        $writer->save($excel_path);

        return response()->download($excel_path);
        return back();

    }

    public function driversExcel()
    {
        $drivers = Driver::orderBy('id','desc')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Ady, Familiýasy we Atasynyň ady');
        $sheet->setCellValue('C1', 'Tabel Belgisi');
        $sheet->setCellValue('D1', 'Doglan güni we ýeri');
        $sheet->setCellValue('E1', 'Bilimi');
        $sheet->setCellValue('F1', 'Pasport belgisi, alynan wagty we ýeri');
        $sheet->setCellValue('G1', 'Telefon belgisi');
        $sheet->setCellValue('H1', ' Ýaşaýan salgysy');
        $sheet->setCellValue('I1', 'Suraty');

        $styleArray = array(
            'font' => array(
                'bold' => true
            )
        );

        $sheet->getStyle('A1')->applyFromArray($styleArray);
        $sheet->getStyle('B1')->applyFromArray($styleArray);
        $sheet->getStyle('C1')->applyFromArray($styleArray);
        $sheet->getStyle('D1')->applyFromArray($styleArray);
        $sheet->getStyle('E1')->applyFromArray($styleArray);
        $sheet->getStyle('F1')->applyFromArray($styleArray);
        $sheet->getStyle('G1')->applyFromArray($styleArray);
        $sheet->getStyle('H1')->applyFromArray($styleArray);
        $sheet->getStyle('I1')->applyFromArray($styleArray);

        foreach($drivers as $key => $driver){
        
            $sheet->getColumnDimension('A')->setWidth(5, 'px');
            $sheet->getColumnDimension('B')->setWidth(50, 'px');
            $sheet->getColumnDimension('C')->setWidth(15, 'px');
            $sheet->getColumnDimension('D')->setWidth(80, 'px');
            $sheet->getColumnDimension('E')->setWidth(10, 'px');
            $sheet->getColumnDimension('F')->setWidth(80, 'px');
            $sheet->getColumnDimension('G')->setWidth(20, 'px');
            $sheet->getColumnDimension('H')->setWidth(80, 'px');
            $sheet->getColumnDimension('I')->setWidth(15, 'px');
            $sheet->getRowDimension($key+2)->setRowHeight(80);
            
            $sheet->setCellValue('A' . (string)($key + 2), $key+1);
            $sheet->setCellValue('B' . (string)($key + 2), $driver->ady . ' ' . $driver->familiyasy . ' ' . $driver->atasynyn_ady);
            $sheet->setCellValue('C' . (string)($key + 2), $driver->tabel_belgisi);
            $sheet->setCellValue('D' . (string)($key + 2), $driver->doglan_guni . ' ' . $driver->doglan_yeri);
            $sheet->setCellValue('E' . (string)($key + 2), $driver->bilimi);
            $sheet->setCellValue('F' . (string)($key + 2), $driver->pasport_belgisi . ' ' . $driver->pasport_alynan_wagty . ' ' . $driver->pasport_alynan_yeri);
            $sheet->setCellValue('G' . (string)($key + 2), $driver->telefon_belgisi);
            $sheet->setCellValue('H' . (string)($key + 2), $driver->yashayan_salgysy);

            if(file_exists($driver->suraty)){
                $drawing = new Drawing();
                $drawing->setWorksheet($spreadsheet->getActiveSheet());                
                
                $drawing->setPath($driver->suraty); // put your path and image here
                $drawing->setCoordinates('I' . (string)($key + 2));
                $drawing->setWidth(100);
                $drawing->setHeight(100);

            } else {
                $sheet->setCellValue('I' . (string)($key + 2), 'Suraty ýok');
            }

        }

        $writer = new Xlsx($spreadsheet);

        $path = public_path().'/excel/awtotoplum-' . Auth::user()->autocolumn_id;

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        $excel_path = $path . '/awtotoplum-' . Auth::user()->autocolumn_id . '-(date-' . date('d-m-y') . ')(time-' . date('h_i_s') . ').xlsx';

        $writer->save($excel_path);

        return response()->download($excel_path);
        return back();
        
    }
}
