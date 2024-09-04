@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">

    <div class="seperator-header layout-top-spacing ">
        <div class="d-flex justify-content-between privacy-head">
            <div class="privacyHeader">
                <h3 class="">Employee List</h3>
            </div>

            <div class="get-privacy-terms align-self-center">
                <a href="{{route('admin.employees.create')}}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg> &nbsp;
                    Add</a>
            </div>

        </div>

    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id='status' class="form-control select2" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id="department_id" name="department_id" class="form-control select2">
                                    <option value="">Select Department</option>
                                    @if ($departments)
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">
                                                {{ $department->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-secondary btn-lg"  id="reset-filter" style="font-size: 14px;">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area br-6">
                <table id="datatable" class="table table-striped table-responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Code</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Designation</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Assign Course</th>
                            <th class="no-content">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="assignModal" autocomplete ="off" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Course For Employee</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="assignCourseForm" id="assignCourseForm" action="{{route('admin.employees.assign-course')}}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- <input type ="hidden" id="employeeId" name="employeeId" > -->
                    <div class="form-group row mb-4">
                        <label for="departmentId" class="col-xl-4 col-sm-3 col-sm-2 col-form-label">Department <span style="color:red;">*</span> </label>
                        <div class="col-xl-8 col-lg-9 col-sm-10">
                            <select name="departmentId" id="departmentId" class="form-control">
                                <option value="">Select Department</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="categoryId" class="col-xl-4 col-sm-3 col-sm-2 col-form-label">Category <span style="color:red;">*</span> </label>
                        <div class="col-xl-8 col-lg-9 col-sm-10">
                            <select name="categoryId" id="categoryId" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="courseId" class="col-xl-4 col-sm-3 col-sm-2 col-form-label">Course <span style="color:red;">*</span></label>
                        <div class="col-xl-8 col-lg-9 col-sm-10">
                            <select name="courseId" id="courseId" class="form-control">
                                <option value="">Select Course</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="assign" style="background-color: #28a745;color: #fff;"  class="btn btn-default assigncourse">Assign</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset();">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('plugins/lightbox-master/dist/ekko-lightbox.js')}}"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        var $this = $(this);
        /* var group = $this.data('gallery');
        var isSingleImage = true;
        if (group) {
            var groupItems = $('[data-gallery="' + group + '"]');
            if (groupItems.length > 1) {
                isSingleImage = false;
            }
        } */
        $(this).ekkoLightbox({
            alwaysShowClose: true
            /* onShown: function() {
                if (isSingleImage) {
                    $('.ekko-lightbox-container').addClass('single-image');
                }
            }*/
        });
    });
    let dTable='';
    $(document).ready(function() 
    {
        $('.select2').select2();
        $('.chosen-select').chosen({
            width: "100%"
        });
        fetchTable();
    });
    $(document).on("change",'#status',function(){
        fetchTable();
    });
    $(document).on("change",'#department_id',function(){
        fetchTable();
    });
    $(document).on("change","#departmentId",function(){
        var departmentId = $(this).val();
        getCategory(departmentId)
    })
    $(document).on("change",'#categoryId',function(){
        var categoryId = $(this).val();
        getCourse(categoryId);
    })
    $(document).on('click','#reset-filter',function()
    {
            $('[name="status"]').select2('destroy');
            $('[name="status"]').val('');
            $('[name="status"]').select2();
            $('[name="department_id"]').select2('destroy');
            $('[name="department_id"]').val('');
            $('[name="department_id"]').select2();
            fetchTable();
    });
    function fetchTable() 
    {
        let table = $('#datatable');
        if(dTable!='')
            table.DataTable().clear().destroy();
        var status = $('[name="status"]').val();
        var department_id = $('[name="department_id"]').val();
        dTable = table.DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            
            autoWidth:1,
            order:[[0,'desc']],
            //ordering:false,
            // stateSave: true,
            ajax: {
                url: '{{route("admin.employees.get-employee-list")}}',
                type: 'POST',
                dataType:'json',
                data:{_token: '{{csrf_token()}}',status:status,department_id:department_id},
            },
            aoColumnDefs:[{className:"dt-center",bSortable:false,aTargets:[0,10,11]},
            {className:"dt-left",bSortable:false,aTargets:[1]},
            {className:"dt-left",width: '85%',bSortable:true,aTargets:[2]},
            {className:"dt-left",width: '40%',bSortable:true,aTargets:[4]},
            {className:"dt-left",width: '20%',bSortable:true,aTargets:[3,5,6,7,8,9]}
        ],
            columns: [
                {data:'sno'},
                {data:'employeeImage'},
                {data:'employeeName'},
                {data:'departmentName'},
                {data:'employeeCode'},
                {data:'employeeContactNo'},
                {data:'employeeEmail'},
                {data:'employeeDesignation'},
                {data:'employeeLocation'},
                {data:'EmployeeStatus'},
                {data:'courseAssign'},
                {data:'action'}
            ]
        });
    }

    $(document).on('click','.status-info',function(e){
        var thz=$(this);
        var dstatus=thz.data('status'); 
        var id=thz.data('id');
        var url = "{{ route('admin.employees.change-status') }}";
        var method = '';
        let cbfn = function() { 
            changeStatus(dstatus,id,method,url); };
        showDynamicModal('confirm','confirmation','Confirmation','Are you sure want to change status ?',cbfn);
    });

    $(document).on('click','.employee_delete',function(e){
        var thz=$(this);
        var id = thz.data("id");
        var url = '{{route("admin.employees.destroy", ":id")}}';
        url = url.replace(':id',id);
        var dstatus = '';
        var method = 'DELETE';
        let cbfn = function() { 
            changeStatus(dstatus,id,method,url); };
        showDynamicModal('confirm','confirmation','Confirmation','Are you sure want to delete employee record ?',cbfn);
    })

    $(document).on('click','.assignee-info',function(e){
        var thz = $(this);
        var id = thz.data("id");
        var departmentId = thz.data('department');
        var departmentName = thz.data('name');
        var userId = thz.data('user_id');
        $("#assignModal").modal();
        var department = '<option value="'+departmentId+'">'+departmentName+'</option>';
        $('select#departmentId').html(department).trigger('chosen:updated');
        $("#employeeId").val(userId);
        getCategory(departmentId);
        
    })


    function changeStatus(dstatus,id,method,url)
    {
        $.ajax({
            type: "POST",
            url: url,
            data:{_token: '{{csrf_token()}}',_method: method,status:dstatus,id:id},
            success: function (data) {
                if(data.status){
                    $('#successModal').modal('show');
                    $("#message").text(data.msg);
                    fetchTable();
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    }
    function showDynamicModal(id,type,title,content,cbFn) {

        let cbBtn = '',okTxt = 'Ok',btnCls='secondary';
        if(type=='confirmation') {
            okTxt = 'No';
            btnCls='danger';
            cbBtn = '<button type="button" class="btn btn-success" id="confirm-ok">Yes</button>';
        }
        $('html>body').append('<div class="modal fade" id="'+id+'" tabindex="-1" role="dialog"  aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'+title+'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">'+content+'</div><div class="modal-footer">'+cbBtn+'<button type="button" class="btn btn-'+btnCls+'" data-dismiss="modal">'+okTxt+'</button></div></div></div></div>');
        $('#'+id).modal('show');
        $('#'+id).on('hidden.bs.modal', function(e) { $('#'+id).remove(); })
        $('#'+id+' #confirm-ok').click(function(e){
            e.preventDefault();
            $('#'+id).modal('hide');
            return cbFn();
        });
    }
    function getCategory(departmentId){
        var category = '<option value="">Select Category</option>';
        $('select#categoryId').html(category).trigger('chosen:updated');
        $.ajax({
            type: "POST",
            url:"{{ route('admin.employees.get-department-category-list') }}",
            data: {_token: '{{csrf_token()}}',departmentId:departmentId},
            success: function(response) {
                if(response.length>0) {
                    for(var i = 0;i < response.length;i++) {
                        let selected = (response[i].id=='{{old('categoryId')}}')?' selected':'';
                        category += '<option value="'+response[i].id+'"'+selected+'>'+response[i].name+'</option>'; 
                    }
                }
                $('#categoryId').html(category).trigger("chosen:updated");
            }
        });
    }

    function getCourse(categoryId){
        var courses = '<option value="">Select Course</option>';
        $('select#courseId').html(courses).trigger('chosen:updated');
        $.ajax({
            type: "POST",
            url:"{{ route('admin.employees.get-category-course-list') }}",
            data: {_token: '{{csrf_token()}}',categoryId:categoryId},
            success: function(response) {
                if(response.length>0) {
                    for(var i = 0;i < response.length;i++) {
                        let selected = (response[i].id=='{{old('courseId')}}')?' selected':'';
                        courses += '<option value="'+response[i].id+'"'+selected+'>'+response[i].title+'</option>'; 
                    }
                }
                $('select#courseId').html(courses).trigger("chosen:updated");
            }
        });
    }
    $(document).on('click','.assigncourse',function(e){
        var formId = "#assignCourseForm";
        $("form#assignCourseForm").validate({
            rules: {
                categoryId: { required: true},
                courseId: { required: true},
            },
            messages: {
                categoryId: { required: "Please select category"},
                courseId: { required: "Please select course"},
            },
            focusInvalid: true,
            invalidHandler: function () {
                $(this).find(":input.error:first").focus();
            },
            submitHandler:function(form)
            {
                var thz = $(form);
                var action = thz.attr('action');
                var method = thz.attr('method');
                console.log("current form action",action);
                console.log("current form method",method);
                return false;


            }
        });
    });

</script>
@endsection
