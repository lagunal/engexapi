<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatumRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CalculationController extends Controller
{
    
    /**
     * Protects against Unauthenticated access
     *
     * 
     */
    public function __construct() 
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DatumRequest $request)
    {

        /** loads the excel file */
        $spreadsheet = IOFactory::load('assets/Datum Suspended Canopy Calculator v22.xlsx');
     
        /** loads the active sheetname */
        $spreadsheet->getSheetByName('HTML Frame');

        /** assign the input values to the excel spreadsheet */
        /** INPUT: Put cells numbers for input values. Ex. D15 for Vult *************/
        $spreadsheet->getActiveSheet()->setCellValue('D15', $request->Vult)
                                            ->setCellValue('D17', $request->Exp)
                                            ->setCellValue('D19', $request->Risk)
                                            ->setCellValue('D25', $request->Snow)
                                            ->setCellValue('D30', $request->MRH)
                                            ->setCellValue('D32', $request->URI)
                                            ->setCellValue('D37', $request->_P)
                                            ->setCellValue('D39', $request->_AA)
                                            ->setCellValue('D41', $request->_AH)
                                            ->setCellValue('D45', $request->_CH)
                                            ->setCellValue('D49', $request->_AT)
                                            ->setCellValue('D51', $request->_GT)
                                            ->setCellValue('D53', $request->TopCon)
                                            ->setCellValue('D55', $request->BotCon);



        /** calculates the values on the excel spreadsheet */
        /** OUTPUT: put cells numbers for output calculated values. Ex. F248 for HAS. *********/
        $data['HAS'] = round($spreadsheet->getActiveSheet()->getCell('F248')->getCalculatedValue(), 5);
        $data['_KS'] = round($spreadsheet->getActiveSheet()->getCell('F252')->getCalculatedValue(), 5);
        $data['_O'] = round($spreadsheet->getActiveSheet()->getCell('F256')->getCalculatedValue(), 5);

        $data['Rxgh'] = round($spreadsheet->getActiveSheet()->getCell('L248')->getCalculatedValue(), 5);
        $data['Rxuh'] = round($spreadsheet->getActiveSheet()->getCell('L250')->getCalculatedValue(), 5);
        $data['Rygh'] = round($spreadsheet->getActiveSheet()->getCell('R248')->getCalculatedValue(), 5);
        $data['Ryuh'] = round($spreadsheet->getActiveSheet()->getCell('R250')->getCalculatedValue(), 5);

        $data['Rxgk'] = round($spreadsheet->getActiveSheet()->getCell('L252')->getCalculatedValue(), 5);
        $data['Rxuk'] = round($spreadsheet->getActiveSheet()->getCell('L254')->getCalculatedValue(), 5);
        $data['Rygk'] = round($spreadsheet->getActiveSheet()->getCell('R252')->getCalculatedValue(), 5);
        $data['Ryuk'] = round($spreadsheet->getActiveSheet()->getCell('R254')->getCalculatedValue(), 5);

        $data['WPpos'] = round($spreadsheet->getActiveSheet()->getCell('G82')->getCalculatedValue(), 5);
        $data['WPneg'] = round($spreadsheet->getActiveSheet()->getCell('N82')->getCalculatedValue(), 5);

        /** return the output $data encoded to json format */
        return response()->json($data);   

        /** TO DO: handle exceptions */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
