@extends('admin/layouts/default')

@section('title')
Createfile
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Createfile View</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Createfiles</li>
        <li class="active">Createfile View</li>
    </ol>
</section>
<style>
     
</style>
<section class="content">

    @include('admin.createfile.createfiles.show_fields')
    

</section>
@stop
