<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class expenditure extends CI_Controller {

	public function index()
	{
		$data['expense'] = $this->sc_model->getExpense();
		$data['title'] = "Add new Expense";
		$this->load->view('admin/expense_add',$data);	
	}

	public function add_customer(){
			$data['customer'] = $this->sc_model->getCustomer();
		$data['title'] = "Add new Customer";
		$this->load->view('admin/customer_add',$data);
	}

	public function expense_month_wise(){?>
<!DOCTYPE html>
<html>
<head>
	<title>Added</title>
    
        <link type="text/css" href="http://demo.itsolution24.com/pos/30/assets/itsolution24/cssmin/main.css" type="text/css" rel="stylesheet">

</head>
<body>


<div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">
              August, 2019            </h3>
            <a class="pull-right pointer no-print" onclick="window.printContent('expense-monthwise-report', {title:'  Expense Monthwise', 'headline':'  Expense Monthwise', screenSize:'fullScreen'});">
              <i class="fa fa-print"></i>   Print            </a>
          </div>
          <div class="box-body pt-0">
            <div class="table-responsive">                     
              <table id="expense-expense-list" class="table table-bordered table-striped table-hovered">
                <thead>
                  <tr class="bg-success">
<!--                       <th class="w-5 text-center bg-black">Sl.</th>
                                          <th class="w-5 text-center">
                        Advertisements                      </th>
                                          <th class="w-5 text-center">
                        Bonous                      </th>
                                          <th class="w-5 text-center">
                        Due Paid to Supplier                      </th>
                                          <th class="w-5 text-center">
                        Electricity Bill + Dish                      </th>
                                          <th class="w-5 text-center">
                        Employee Salary                      </th>
                                          <th class="w-5 text-center">
                        Giftcard Sell Delete                      </th>
                                          <th class="w-5 text-center">
                        Giftcard Topup Delete                      </th>
                                          <th class="w-5 text-center">
                        Loan Delete                      </th>
                                          <th class="w-5 text-center">
                        Loan Payment                      </th>
                                          <th class="w-5 text-center">
                        Others                      </th>
                                          <th class="w-5 text-center">
                        Other Exp                      </th>
                                          <th class="w-5 text-center">
                        Rent                      </th>
                                          <th class="w-5 text-center">
                        Sell Delete                      </th>
                                          <th class="w-5 text-center">
                        Sell Return                      </th>
                                          <th class="w-5 text-center">
                        Showroom Rent                      </th>
                                          <th class="w-10 text-center bg-red">Total</th> -->
                  </tr>
                </thead>
                <tbody>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">1</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            166.00                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            100.00                          </td>
                                                  <td class="w-5 text-center">
                            2,610.00                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          2,876.00                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">2</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">3</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">4</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            1,200.00                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            10.00                          </td>
                                                  <td class="w-5 text-center">
                            100.00                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          1,310.00                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">5</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">6</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">7</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">8</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">9</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">10</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">11</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">12</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">13</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">14</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">15</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">16</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">17</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">18</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">19</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">20</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">21</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">22</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">23</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">24</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">25</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">26</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">27</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">28</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">29</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">30</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                        <tr class="bg-gray">
                          <td class="w-5 text-center bg-black">31</td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                  <td class="w-5 text-center">
                            -                          </td>
                                                <td class="w-10 text-center bg-green">
                          -                        </td>
                      </tr>
                                  </tbody>
                <tfoot>
                  <tr class="bg-success">
                      <th class="w-5 text-center bg-red">Total</th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        1,366.00                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-5 text-center">
                        110.00                      </th>
                                          <th class="w-5 text-center">
                        2,710.00                      </th>
                                          <th class="w-5 text-center">
                        -                      </th>
                                          <th class="w-10 text-center bg-primary">4,186.00</th>
                  </tr>
                </tfoot>
              </table>    
            </div>
          </div>
        </div>
</body>
</html>
	<?php }
	public function insertExpense(){

$data = array(
"ref_no" 		=> strip_tags($this->input->post('ref_no')),
"exp_category" 		=> strip_tags($this->input->post('exp_category')),
"what_for" 		=> strip_tags($this->input->post('what_for')),
"amount" 		=> strip_tags($this->input->post('amount')),
"is_returnable" 		=> strip_tags($this->input->post('is_returnable')),
"notes" 	=> strip_tags($this->input->post('notes')),
"created_user_id"		=>strip_tags($this->input->post('create_user_id')),
"created_datetime"		=>date('m/d/Y h:i:s', time()),
'account_type'=> strip_tags($this->input->post('account_type'))
);
$op = array('opening_balance' => strip_tags($this->input->post('opening_balance')),
'set_date' => date('Y-m-d '),
'set_time' => date('H:i A',time())
);

    $ret  = $this->sc_model->insertExpense($data,$op);		
		if($ret){
				$this->session->set_flashdata('msg','Expense has been added');
				$p = $this->extra_lib->path."/expenditure";
				redirect($p);
		}
	}	


	 public function edit_expense($id = null){

		$data['expenseID'] = $this->sc_model->get_expense_with_id($id);

 		$data['title'] = "Edit Expenditure";
		$this->load->view('admin/edit_expense.php',$data); 	

	}	


	public function update_expense(){

		$id = $this->input->post('expn_id');
$created_user_id = $this->session->userdata('userVal');
$data = array(
"ref_no" 		=> strip_tags($this->input->post('ref_no')),
"exp_category" 		=> strip_tags($this->input->post('exp_category')),
"what_for" 		=> strip_tags($this->input->post('what_for')),
"amount" 		=> strip_tags($this->input->post('amount')),
"is_returnable" 		=> strip_tags($this->input->post('is_returnable')),
"notes" 	=> strip_tags($this->input->post('notes')),
"created_user_id"		=>$created_user_id['id'],
"created_datetime"		=>date('m/d/Y h:i:s', time())
);


			$retV = $this->sc_model->update_expense($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','Expense has been updated');
				$p = $this->extra_lib->path."/expenditure";
				redirect($p);
 			}	
	}

	 public function delete_expense($id = null){

	 	$del = $this->sc_model->delete_expense($id);
		if($del){
				$this->session->set_flashdata('remove','Expense has been deleted');
				$p = $this->extra_lib->path."/expenditure";
				redirect($p);
			}		
	}	

}
	?>