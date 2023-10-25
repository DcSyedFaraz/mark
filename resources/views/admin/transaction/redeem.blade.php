@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Redeems Transactions</h3>
            </div>
           <!-- /.card-header -->
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>Sl.</th>
                <th>Time</th>
                <th>Game</th>
                <th>Game ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>

                </tr>
              </thead>
              <?php $i =0; ?>
              @foreach($redeem as $red)
              <?php $i++ ?> 
              <tbody>
                  <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $red->created_at->diffForHumans() }}</td>
                  <td>{{ $red->games->name }}</td>
                  <td>{{ $red->games->link_game->game_link }}</td>
                  <td style="color:green"> +${{ $red->amount}}</td>
                   @if($red->status == 1)
                    <td style="color:orange">Pending</td>
                  @else
                    <td style="color:green">Approved</td>
                  @endif
                  <td>
                  <form method="POST" action="{{ route('redeems.approved', $red->id) }}">
                    @csrf
                    @method('PUT')
                  <button type="submit" class="btn btn-success  approve-btn" data-id="{{ $red->id }}">Approve</button>
                  </form>
                  </td> 
                  </tr>
              </tbody>
              @endforeach
              </table>            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(document).ready(function() {
        $('.approve-btn').click(function(e) {
            e.preventDefault();
            
            var itemId = $(this).data('id');
          
            $.ajax({
                type: 'PUT',
                url: '/withdrawals/approved/' + itemId,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'status': 'approved'
                },
                success: function(data) {
                    $('.status-' + itemId).text('approved');
                }
            });
        });
    });
</script>
 
@endsection


   

