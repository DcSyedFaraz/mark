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
              <h3 class="card-title">Deposit Transaction</h3>
            </div>
           
            <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                      <th>Sl.</th>
                      <th>Time</th>
                      <th>Txn By</th>
                      <th>Txn</th>
                      <th>Game ID</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Method</th>
                      <th>status</th>
                      <th>Action</th>
                      </tr>
                  </thead>
                  <?php $i =0; ?>
                  @foreach($deposit as $dep)
                  <?php $i++ ?> 
                  <tbody>
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $dep->created_at->diffForHumans() }}</td>
                        <td>SELF</td>
                        <td>Wallet Balance</td>
                        <td></td>
                        <td>Deposit</td>
                        <td style="color:green"> +${{ $dep->amount}}</td>
                        <td>Wallet</td>
                        @if($dep->status == 1)
                    <td style="color:orange">Pending</td>
                    @else
                      <td style="color:green">Approved</td>
                    @endif
                  <td>
                  <form method="POST" action="{{ route('deposit.approved', $dep->id) }}">
                    @csrf
                    @method('PUT')
                  <button type="submit" class="btn btn-success  approve-btn" data-id="{{ $dep->id }}">Approve</button>
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


   

