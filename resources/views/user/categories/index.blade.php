@extends('layouts.master')

@section('content')
  
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Category
        <small>Directory</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
    </ol>
</section>

<!-- Main content -->
    <section class="content">

        {{--  @include('layouts.partials.message')  --}}

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Category Directory</h3>
                        <div class="box-header-buttons pull-right">
                            <a href="{{ route('category.create') }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> New Category</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($categories->count() > 0)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ date('M j,Y', strtotime($category->created_at )) }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('category.destroy', ['id' => $category->id]) }}" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                        <th colspan="5" class="text-center">There no categories yet</th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection