@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
         <div class="col-md-12">
            
   <h3 align="center">Import Excel File </h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif 
    @if($message = Session::get('error'))

   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif



                    @if (session()->has('failures'))

                           @foreach (session()->get('failures') as $key => $validation)
                            <div class="alert alert-danger alert-block">
                               
                                       <strong>There was an error on row {{$key-1}}.  </strong>
                             <ul>
                            @foreach ($validation as $v)
                                 
                            <li>{{$v->errors()[0]}}</li>
                            @endforeach</ul>  </div>
                          
                       @endforeach
                      
                    @endif


   <form method="post" enctype="multipart/form-data" action="{!! route('excel.import') !!}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       </td>
      </tr>
   
      
     </table>
    </div>
   </form>

   <br />
  
        </div>
        </div>
        </div>
 @endsection
