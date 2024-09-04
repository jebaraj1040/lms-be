@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">

    <div class="seperator-header layout-top-spacing ">
        <div class="d-flex justify-content-between privacy-head">
            <div class="privacyHeader">
                <h3 class="">Course List</h3>
            </div>

            <div class="get-privacy-terms align-self-center">
                <a href="{{route('admin.courses.create')}}" class="btn btn-primary">
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
                                <select id='categoryId' class="form-control select2" name="categoryId">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $list)
                                    <option value="{{$list->id}}">{{$list->name}}</option>
                                    @endforeach
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
                <table id="datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Department</th>
                            <th>Course Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Course Duration (In Days)</th>
                            <th>Featured Status</th>
                            <th>Published</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Created</th>
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
@endsection
@section('javascript')
<script src="{{asset('plugins/lightbox-master/dist/ekko-lightbox.js')}}"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
    let dTable='';
    $(document).ready(function() 
    {
        $('.select2').select2();
        fetchTable();
    });
    $(document).on("change",'#status',function(){
    fetchTable();
});
    $(document).on("change",'#categoryId',function(){
        fetchTable();
    })
    $(document).on('click','#reset-filter',function()
    {
            $('[name="status"],[name="categoryId"]').select2('destroy');
            $('[name="status"],[name="categoryId"]').val('');
            $('[name="status"],[name="categoryId"]').select2();
            fetchTable();
    });
    function fetchTable() 
    {
        let table = $('#datatable');
        if(dTable!='')
            table.DataTable().clear().destroy();
        var status = $('[name="status"]').val();
        var categoryId   = $('[name="categoryId"]').val();
        dTable = table.DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            autoWidth:1,
            order:[[0,'desc']],
            //ordering:false,
            // stateSave: true,
            ajax: {
                url: '{{route("admin.courses.get-course-list")}}',
                type: 'POST',
                dataType:'json',
                data:{_token: '{{csrf_token()}}',status:status,categoryId:categoryId},
            },
            aoColumnDefs:[{className:"dt-center",bSortable:false,aTargets:[0]},
            {className:"dt-left",bSortable:true,aTargets:[1,2,3,4,5,6,7,8,9,10,11]}
        ],
            columns: [
                {data:'sno'},
                {data:'department'},
                {data:'courseCategory'},
                {data:'courseTitle'},
                {data:'courseImage'},
                {data:'courseDuration'},
                {data:'featuredStatus'},
                {data:'published'},
                {data:'createdBy'},
                {data:'status'},
                {data:'createdAt'},
                {data:'action'}
            ]
        });
    }
    $(document).on('click', '.course_delete', function (e) {
        
        var id = $(this).data("id");
        var url = '{{route("admin.courses.destroy", ":id")}}';
        url = url.replace(':id',id);
        if(confirm('Are You Sure do you want to Delete')){
            $.ajax({
                type: 'POST',
                data: {
                    id: id,
                    _method: 'DELETE',
                    '_token': '{{ csrf_token() }}'
                },
                url: url,
                success: function (data)
                {
                    if(data.status==true)
                    {
                        toastr.success(data.msg);
                        fetchTable();                       
                    }else{
                        toastr.error(data.msg);
                    }
                },
                error: function (data)
                {
                    console.log(data);
                    toastr.error(data.msg);
                }
            });
        }
    });
</script>
@endsection
