@extends('layouts.app')

@section('content')


<style>
    table td {
        font-size: 14px !important;
        padding: 5px 5px 5px 5px !important;
        height: auto !important;}


        /* #tbl_projects_wrapper{
        width: 100%;
    } */
        .col-md-5 {
            text-align: right;
        }

        .col-md-2 .card-body {
            padding-top: 5px !important;
            padding-bottom: 5px !important;
        }

        .col-md-2 .card {
            margin-top: 5px !important;
        }
</style>

<style>
    /* #tbl_projects_wrapper{
        width: 100%;
    } */
    .col-md-5 {
        text-align: right;
    }

    .col-md-2 .card-body {
        padding-top: 10px !important;
        padding-bottom: 0px !important;
    }

    .col-md-2 .card {
        margin-top: 5px !important;
    }
</style>


<div class="container-fluid">
    <div class="row">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" onclick="display()">Add Worker</button>
                        </div>
                        <div class="col-md-10">
                            <div class="form-check form-switch" style="float: right;">
                                <input  class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked />
                                <label class="form-check-label" for="flexSwitchCheckChecked">Fac</label>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-secondary" style="text-align: center"
                            onclick="display('all')">Project Site Attendace Date & Hour<br><span style="font-size: 16px;">
                                现场工作日期和时间</button>

                        <div class="row">
                            <table id="table_manpower" class="table mdl-data-table" style="width: 100%" idisplayLength="25">
                                <thead>
                                    <tr>
                                        <th><b>
                                                <font color=#000080>P.CODE
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>P.NAME
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>SUPERVISOR
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>CLIENT
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>DATE
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>WORKER NAME
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>WORKER ID
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>RATE/HOUR
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>NO. HOURS
                                            </b></th>
                                        <th><b>
                                                <font color=#000080>TOTAL MANPOWER COST
                                            </b></th>
                                    </tr>
                                </thead>

                                <tbody id="table_man_power-tbody">
                                    @for($i = 0; $i < count($Man_power); $i++) <tr
                                        ondblclick="editRow('{{$Man_power[$i]->man_id}}')"
                                        id="table_man_power-{{$Man_power[$i]->man_id}}">
                                        <td class='p_code' data-text="{{$Man_power[$i]->p_code}}">{{$Man_power[$i]->p_code}}
                                        </td>
                                        <td class="p_name" data-text="{{$Man_power[$i]->p_name}}"><b>
                                                <font color=#8B008B>{{$Man_power[$i]->p_name}}
                                            </b></td>
                                        <td class="worker_supervisor" data-text="{{$Man_power[$i]->worker_supervisor}}">
                                            {{$Man_power[$i]->worker_supervisor}}</td>
                                        <td class="company_name" data-text="{{$Man_power[$i]->company_name}}"><b>
                                                <font color=##0000FF>{{$Man_power[$i]->company_name}}
                                            </b></td>
                                        <td class="man_date" data-text="{{$Man_power[$i]->man_date}}">
                                            {{$Man_power[$i]->man_date}}</td>
                                        <td class="worker_name" data-text="{{$Man_power[$i]->worker_id}}">
                                            {{$Man_power[$i]->worker_name}}</td>
                                        <td class="worker_key" data-text="{{$Man_power[$i]->worker_key}}">
                                            {{$Man_power[$i]->worker_key}}</td>
                                        <td clas="worker_rate" data-text="{{$Man_power[$i]->worker_rate}}">
                                            {{$Man_power[$i]->worker_rate}}</td>
                                        <td class="man_hours" data-text="{{$Man_power[$i]->man_hours}}"><b>
                                                <font color=red>{{$Man_power[$i]->man_hours}}
                                            </b></td>
                                        <td class="total" data-text={{$Man_power[$i]->worker_rate *
                                            $Man_power[$i]->man_hours}}">{{$Man_power[$i]->worker_rate *
                                            $Man_power[$i]->man_hours}} </td>


                                        </tr>
                                        @endfor
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-secondary " style="text-align: center"
                            onclick="display('all')">Worker & Supervisor Name List <br>工人和主管名单</button>


                        <div class="row">
                            <table class="table mdl-data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th><b>WORKER ID</b></th>
                                        <th><b>WORKER NAME</b></th>
                                        <th><b>HOURLY RATE</b></th>
                                    </tr>
                                </thead>
                                <tbody id="table_worker-tbody">
                                    @for($i = 0; $i < count($Worker); $i++) <tr
                                        ondblclick="editworker('{{$Worker[$i]->worker_id}}')"
                                        id="table_worker-{{$Worker[$i]->worker_id}}">

                                        <td class="worker_name" data-text="{{$Worker[$i]->worker_name}}">
                                            {{$Worker[$i]->worker_key}}</td>


                                        <td class="worker_key" data-text="{{$Worker[$i]->worker_key}}">
                                            {{$Worker[$i]->worker_name}}</td>

                                        <td class="worker_rate" data-text="{{$Worker[$i]->worker_rate}}">
                                            {{$Worker[$i]->worker_rate}}</td>

                                        </tr>
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Worker</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="modal-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Worker Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="worker_name">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    <label>Worker ID</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" id="worker_id">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    <label>Rate/Hour</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" id="rate">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mdc-form-field">
                                    <label for="radio-1">Supervisor</label>
                                    <div class="mdc-radio">
                                        <input class="mdc-radio__native-control" type="radio" id="supervisor"
                                            name="radios" checked>
                                        <div class="mdc-radio__background">
                                            <div class="mdc-radio__outer-circle"></div>
                                            <div class="mdc-radio__inner-circle"></div>
                                        </div>
                                        <div class="mdc-radio__ripple"></div>
                                    </div>
                                    <div class="mdc-radio">
                                        <input class="mdc-radio__native-control" type="radio" id="nosupervisor"
                                            name="radios" checked>
                                        <div class="mdc-radio__background">
                                            <div class="mdc-radio__outer-circle"></div>
                                            <div class="mdc-radio__inner-circle"></div>
                                        </div>
                                        <div class="mdc-radio__ripple"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="addWorker()">OK</button>
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit ManPower</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="modal-content">
                            <div class="row justify-content-center">

                                <div class="row" style="margin-top:10px">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <label>P.code</label>
                                        </div>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control" id="edit-p_code" onchange="get_name()">
                                                <option></option>
                                                @for($i = 0; $i < count($Projects); $i++) <option>
                                                    {{$Projects[$i]['p_code']}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <label>P.Name</label>
                                        </div>
                                        <div class="col-md-9 col-sm-6">
                                            <input class="form-control" id="edit-p_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <label>Company Name</label>
                                        </div>
                                        <div class="col-md-9 col-sm-6">
                                            <input class="form-control" id="edit-company_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <label>Date</label>
                                        </div>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="date" class="form-control" id="edit-man_date"
                                                value="{{date('Y-m-d')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <label>Worker Name</label>
                                        </div>
                                        <div class="col-md-9 col-sm-6">
                                            <select class="form-control" id="edit-worker_name">
                                                @for($i = 0; $i < count($Worker); $i++) <option
                                                    value="{{$Worker[$i]->worker_id}}">{{$Worker[$i]->worker_name}}
                                                    </option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <label>Hours</label>
                                        </div>
                                        <div class="col-md-9 col-sm-6">
                                            <input type="number" class='form-control' id="edit-man_hours">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="update_btn"
                            onclick="edit_project('update')">Update</button>
                        <button type="button" class="btn btn-primary" id="delete_btn"
                            onclick="edit_project('delete')">Delete</button>
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Worker</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="modal-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Worker Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="bottom-worker_name">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    <label>Worker ID</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" id="bottom-worker_key">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    <label>Rate/Hour</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" id="bottom-worker_rate">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="editbottom('update')">update</button>
                        <button type="button" class="btn btn-primary" onclick="editbottom('delete')">delete</button>

                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $(".total").filter(function () {
                    $(this).text(($(this).text() * 1).toFixed(2))
                })
                $("#table_manpower").DataTable({

                }).order([4, 'desc']).draw();
            })
            function display() {
                $("#exampleModal").modal('show');
            }

            let supervisor = 0;
            $("#supervisor").change(function () {
                supervisor = 1;
                console.log(supervisor);
            })
            $("#nosupervisor").change(function () {
                supervisor = 0
                console.log(supervisor);
            })

            function addWorker() {
                let workername = $("#worker_name").val();
                let workerId = $("#worker_id").val();
                let rate = $("#rate").val();
                let insertdata = { worker_name: workername, worker_key: workerId, worker_rate: rate, worker_supervisor: supervisor };
                $.ajax({
                    type: 'post',
                    url: "{{url('/manpower/insert_worker')}}",
                    data: {
                        supervisor: supervisor,
                        data: insertdata
                    },
                    success: function (data) {
                        toastFunction();
                        displayworkers();
                    }
                })
            }

            let present_Id;
            function editRow(man_id) {
                present_Id = man_id;
                let result = {};
                $("#table_man_power-" + man_id + " td").filter(function () {
                    let clname = $(this).attr("class").split(" ")[0];
                    result[clname] = $(this).data("text");
                    $("#edit-" + clname).val($(this).data('text'))
                })
                $("#exampleModal2").modal('show');
            }
            let present_worker_Id;
            function editworker(worker_id) {
                present_worker_Id = worker_id;
                let result = {};
                $("#table_worker-" + worker_id + " td").filter(function () {
                    let clname = $(this).attr("class");
                    result[clname] = $(this).data("text");
                    $("#bottom-" + clname).val($(this).data('text'))
                })
                $("#exampleModal3").modal('show');
            }

            let projects = `<?php echo json_encode($Projects)?>`;
            let total = JSON.parse(projects);

            function get_name() {
                let chage_sel = $("#edit-p_code").val();
                for (let i = 0; i < total.length; i++) {
                    if (total[i]['p_code'] == chage_sel) {
                        $("#edit-p_name").val(total[i]['p_name']);
                        $("#edit-company_name").val(total[i]['company_name']);
                    }

                }
            }

            function edit_project(editType) {
                let editData = {};
                let p_code = $("#edit-p_code").val();
                let date = $("#edit-man_date").val();
                let worker_id = $("#edit-worker_name").val();
                let man_hours = $("#edit-man_hours").val();
                let p_name = $("#edit-p_name").val();
                let company_name = $("#edit-companu_name").val();
                editData['man_date'] = date;
                editData['man_workerid'] = worker_id;
                editData['man_hours'] = man_hours;
                editData['p_code'] = p_code;
                console.log(editData);
                $.ajax({
                    type: 'post',
                    url: "{{url('/manpower/edit')}}",
                    data: {
                        editType: editType,
                        present_Id: present_Id,
                        editData: editData
                    },
                    success: function (data) {
                        displaymans();
                        toastFunction()
                    }
                })
            }

            function editbottom(editType) {
                let workname = $("#bottom-worker_name").val();
                let worker_key = $("#bottom-worker_key").val();
                let worker_rate = $("#bottom-worker_rate").val();
                let result = { worker_name: workname, worker_key: worker_key, worker_rate: worker_rate };

                $.ajax({
                    type: 'post',
                    url: "{{url('/manpower/editworker')}}",
                    data: {
                        editType: editType,
                        editData: result,
                        present_Id: present_worker_Id
                    },
                    success: function (data) {
                        toastFunction()
                        displayworkers()
                    }
                })
            }

            function displaymans() {
                $.ajax({
                    type: "post",
                    url: "{{url('/manpower/getmans')}}",
                    data: {

                    },
                    success: function (data) {
                        let workerhtml = "";
                        for (let i = 0; i < data.length; i++) {
                            workerhtml += "<tr ondblclick='editRow(" + data[i]['man_id'] + ")'>";
                            workerhtml += "<td class='p_code'>" + data[i]['p_code'] + "</td>";
                            workerhtml += "<td class='p_name'>" + data[i]['p_name'] + "</td>";
                            workerhtml += "<td class='worker_supervisor'>"+data[i]['worker_supervisor'] + "</td>";
                            workerhtml += "<td class='company_name'>" + data[i]['company_name'] + "</td>";
                            workerhtml += "<td class='man_date'>" + data[i]['man_date'] + "</td>";
                            workerhtml += "<td class='worker_name'>" + data[i]['worker_name'] + "</td>";
                            workerhtml += "<td class='worker_key'>" + data[i]['worker_key'] + "</td>";
                            workerhtml += "<td class='worker_rate'>" + data[i]['worker_rate'] + "</td>";
                            workerhtml += "<td class='man_hours'>" + data[i]['man_hours'] + "</td>";
                            workerhtml += "<td class='total'>" + (data[i]['worker_rate'] * data[i]['man_hours']).toFixed(2) + "</td>";
                            workerhtml += "</tr>";
                        }
                        $("#table_man_power-tbody").html(workerhtml);

                    }
                })
            }

            function displayworkers() {
                $.ajax({
                    type: 'post',
                    url: "{{url('/manpower/getworkers')}}",
                    success: function (data) {
                        let workerhtml = "";
                        console.log(data);
                        for (let i = 0; i < data.length; i++) {
                            workerhtml += "<tr ondblclick='editBottom(" + data[i]['worker_id'] + ")'>";
                            workerhtml += "<td class='worker_key'>" + data[i]['worker_key'] + "</td>";
                            workerhtml += "<td class='worker_name'>" + data[i]['worker_name'] + "</td>";
                            workerhtml += "<td class='worker_rate'>" + data[i]['worker_rate'] + "</td>";
                            workerhtml += "</tr>";
                        }
                        $("#table_worker-tbody").html(workerhtml)
                    }
                })
            }

        </script>

        @endsection