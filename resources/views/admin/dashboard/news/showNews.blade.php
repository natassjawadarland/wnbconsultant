@extends('admin/app')

@section('main-content')
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>News's post Management </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">news</h3>
              <a class="col-lg-offset-5 btn btn-success" href="{{ 'news/create' }}">Create new news post</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Created at</th>
                  <th>status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>

                  @foreach ($newss as $news)

                  <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $news->title }}</td>
                  <td>{{ $news->created_at }}</td>
                  <td>{{ $news->status }}</td>

                  <td><a href="{{  route('news.edit',$news->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                    &nbsp;
                    <form id="delete-form-{{  $news->id }}" method="post" action="{{  route('news.destroy',$news->id) }}" style="display: none;">

                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                    </form>

                    <a href="" onclick="
                    if(confirm('Are you want to delete this?'))
                    {
                      event.preventDefault();document.getElementById('delete-form-{{ $news->id }}').submit();
                    }
                      else{
                        event.preventDefault();
                    }"><span class="glyphicon glyphicon-trash"></span></a>


                  </td>
                </tr>

                  @endforeach
                
              </tbody>
              </tfoot>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection