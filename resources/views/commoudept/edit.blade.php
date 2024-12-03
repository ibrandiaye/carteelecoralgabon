{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Modifier Département')

@section('content')
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Province</a></li>
        <li class="breadcrumb-item active" aria-current="page">MODIFICATION D'UN COMMUNE OU D'UNE DEPARTMENT</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    {!! Form::model($commoudept, ['method'=>'PATCH','route'=>['commoudept.update', $commoudept->id]]) !!}
        @csrf
        <div class="card ">
            <div class="card-header text-center">FORMULAIRE DE MODIFICATION Département</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Commune  ou Commoudept</label>
                    <input type="text" name="commoudept" class="form-control" value="{{$commoudept->commoudept}}"   required>
                    </div>

                </div>
                <div class="col-lg-6">
                    <label>Province</label>
                    <select class="form-control" name="province_id" required="">
                        @foreach ($provinces as $province)
                        <option {{old('province_id', $commoudept->province_id) == $province->id ? 'selected' : ''}}
                            value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach

                    </select>
                </div>
                <div>
                    <center>
                        <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>
                    </center>
                </div>


             </div>
        </div>
    {!! Form::close() !!}
</div>

@endsection
