@extends('layouts.admin_master')

@section('Shipping')
    active show-sub
@endsection

@section('state')
    active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-com</a>
        <span class="breadcrumb-item active">state</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">state List</div>
                    <div class="card-body">
                        <div class="card pd-20 pd-sm-40">
                            <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>                                
                                        <th class="wd-30p">Division-Name</th>                 
                                        <th class="wd-30p">District-Name</th>                 
                                        <th class="wd-30p">State-Name</th>                 
                                        <th class="wd-30p">Action</th>                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($states as $d)
                                        <tr>                                   
                                            <td>{{ $d->division->division_name }}</td>
                                            <td>{{ $d->district->district_name }}</td>
                                            <td>{{ $d->state_name }}</td>
                                            <td>
                                                <a href="{{ url('admin/state-edit/'.$d->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('admin/state-delete/'.$d->id) }}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                      
                                    @endforeach
                                </tbody>
                            </table>
                            </div><!-- table-wrapper -->
                        </div><!-- card -->state
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add New state </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('state_store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Select Division<span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="division_id">
                              <option label="chose one"></option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ (ucwords($division->division_name)) }}</option>
                                @endforeach
                              </select> 
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Select district<span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="district_id">
                              <option label="chose one"></option>
                               
                              </select> 
                            @error('district_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">state_name<span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="state_name"  placeholder="state_name">
                            @error('state_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">state Add</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
            if(division_id) {
              $.ajax({
                  url: "{{  url('/admin/getdistrict/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){

                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');

                        });

                  },

              });
          } else {
              alert('danger');
          }

      }); 

  });

  </script>
  
@endsection