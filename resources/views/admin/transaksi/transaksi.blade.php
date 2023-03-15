@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">TABLE TRANSAKSI</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Advanced Tables
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('transaksi.create') }}" class="btn btn-success" style="margin-bottom: 10px"><i
                                class="fa fa-plus
                            "></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Invoice</th>
                                        <th>Member</th>
                                        <th>Status</th>
                                        <th>Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksis as $key => $transaksi)
                                        <tr class="odd gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $transaksi->kode_invoice }}</td>
                                            <td>{{ $transaksi->member->nama }}</td>
                                            <td>{{ $transaksi->status }}</td>
                                            <td>{{ $transaksi->dibayar }}</td>
                                            <td>
                                                <div style="display: flex; justify-content: center; column-gap: 10px">
                                                    <a href="{{ route('transaksi.show', $transaksi->id) }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-eye"></i> Show</a>
                                                    <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                                                        class="btn btn-warning d-inline-block"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash-o"></i> Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <div class="row">
			<div class="col-md-6">
				<div class="panel panel-default  panel--styled">
					<div class="panel-body">
						<div class="col-md-12 panelTop">
							<div class="col-md-4">
								<img class="img-responsive" src="http://placehold.it/350x350" alt=""/>
							</div>
							<div class="col-md-8">
								<h2>Product Name</h2>
								<p>Lorem ipsum dolor sit amet, altera propriae iudicabit eos ne. Vel ut accusam tacimates, prima oratio ius ea. Et duo alii verterem principes, te quo putent melius fabulas, ei scripta eligendi appareat duo.</p>
							</div>
						</div>

						<div class="col-md-12 panelBottom">
							<div class="col-md-4 text-center">
								<button class="btn btn-lg btn-add-to-cart"><span class="glyphicon glyphicon-shopping-cart"></span>   Add to Cart</button>
							</div>
							<div class="col-md-4 text-left">
								<h5>Price <span class="itemPrice">$24.99</span></h5>
							</div>
							<div class="col-md-4">
								<div class="stars">
								 <div id="stars" class="starrr"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection
