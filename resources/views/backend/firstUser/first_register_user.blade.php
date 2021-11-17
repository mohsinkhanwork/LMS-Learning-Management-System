@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">First Registered Users</h3>
            
        </div>
        @if( Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
        <div class="card-body table-responsive">
            

             <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Question & 4 Options</th>
      <th scope="col">Selected Answer of User</th>
    </tr>
  </thead>

   @isset ($firstregisters)
   @php $i = 1;  @endphp
    @foreach($firstregisters as $firstregister)
              <tbody>
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$firstregister->user->full_name ?? ''}}</td>
                  <td>
                    <b>Question: </b> ¿Cuál es tu objetivo? <br>
                    <ul>
                        <li>Escribir una novela</li>
                        <li>Publicar un libro en Amazon</li>
                        <li>Aprender técnica narrativa</li>
                        <li>Todas las anteriores</li>
                    </ul>

                  </td>

                  <td>{{$firstregister->firstregister}}</td>

       
                </tr>

              </tbody>


   @php $i++;  @endphp
    @endforeach
    @endisset

</table>
            

            
        </div>  
    </div>
@stop

@push('after-scripts')
 

@endpush