@extends('backend.layouts.app')
@section('title', 'Dashboard - Cars')
@section('content')

<div class="mt-4 mb-5">
    <h2>Available Car Product Page</h2>

    <div class="row mt-5">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong class="">C A R - L I S T</strong></h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="line-bmw-tab" data-bs-toggle="pill" href="#line-bmw" role="tab" aria-controls="pills-bmw" aria-selected="true">BMW</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-mercedes-tab" data-bs-toggle="pill" href="#line-mercedes" role="tab" aria-controls="pills-mercedes" aria-selected="false">Mercedes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-porsche-tab" data-bs-toggle="pill" href="#line-porsche" role="tab" aria-controls="pills-porsche" aria-selected="false">Porsche</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-subaru-tab" data-bs-toggle="pill" href="#line-subaru" role="tab" aria-controls="pills-subaru" aria-selected="false">Subaru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-toyota-tab" data-bs-toggle="pill" href="#line-toyota" role="tab" aria-controls="pills-toyota" aria-selected="false">Toyota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-nissan-tab" data-bs-toggle="pill" href="#line-nissan" role="tab" aria-controls="pills-nissan" aria-selected="false">Nissan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade show active" id="line-bmw" role="tabpanel" aria-labelledby="line-bmw-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Add Row</h4>
                                        <button
                                            class="btn btn-primary btn-round ms-auto"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Add Row
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">Add</span>
                                                        <span class="fw-mediumbold">New</span>
                                                        <span class="fw-mediumbold">Car</span>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Make sure to fill in all the data so it can be added</p>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <!-- Merek -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carBrand" class="form-label">Merek</label>
                                                                    <select id="carBrand" class="form-select">
                                                                        <option disabled selected>Choose a brand</option>
                                                                        <option value="Toyota">Toyota</option>
                                                                        <option value="Honda">Honda</option>
                                                                        <option value="BMW">BMW</option>
                                                                        <option value="Mercedes">Mercedes</option>
                                                                    </select>
                                                                </div>
                                                                <!-- Car Type -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carType" class="form-label">Car Type</label>
                                                                    <input id="carType" type="text" class="form-control" placeholder="e.g., Corolla, Civic, X5" />
                                                                </div>
                                                                <!-- Car Category -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carType" class="form-label">Type Car</label>
                                                                    <input id="carType" type="text" class="form-control" placeholder="SUV, Coupe, Sedan" />
                                                                </div>
                                                                <!-- Photo -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carPhoto" class="form-label">Photo</label>
                                                                    <input id="carPhoto" type="file" class="form-control" />
                                                                </div>
                                                                <!-- Description -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carDescription" class="form-label">Description</label>
                                                                    <textarea id="carDescription" class="form-control" rows="3" placeholder="Provide a detailed description..."></textarea>
                                                                </div>
                                                                <!-- Engine -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carEngine" class="form-label">Car Engine</label>
                                                                    <input id="carEngine" type="text" class="form-control" placeholder="e.g., 2.0L Turbo, Electric" />
                                                                </div>
                                                                <!-- Transmission -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carTransmission" class="form-label">Car Transmission</label>
                                                                    <select id="carTransmission" class="form-select">
                                                                        <option disabled selected>Select transmission</option>
                                                                        <option value="Manual">Manual</option>
                                                                        <option value="Automatic">Automatic</option>
                                                                    </select>
                                                                </div>
                                                                <!-- Capacity -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carCapacity" class="form-label">Car Capacity</label>
                                                                    <input id="carCapacity" type="number" class="form-control" placeholder="e.g., 5 seats" />
                                                                </div>
                                                                <!-- Features -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carFeatures" class="form-label">Car Features</label>
                                                                    <input id="carFeatures" type="text" class="form-control" placeholder="e.g., Sunroof, Navigation" />
                                                                </div>
                                                                <!-- Price -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carPrice" class="form-label">Car Price</label>
                                                                    <input id="carPrice" type="text" class="form-control" placeholder="e.g., 30000000" />
                                                                </div>
                                                                <!-- Status -->
                                                                <div class="form-group mb-3">
                                                                    <label for="carStatus" class="form-label">Car Status</label>
                                                                    <select id="carStatus" class="form-select">
                                                                        <option disabled selected>Select status</option>
                                                                        <option value="Sale">For Sale</option>
                                                                        <option value="Sold">Sold</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="tooltip"
                                                                title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="tooltip"
                                                                title=""
                                                                class="btn btn-link btn-danger"
                                                                data-original-title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-mercedes" role="tabpanel" aria-labelledby="line-mercedes-tab">
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="line-porsche" role="tabpanel" aria-labelledby="line-porsche-tab">
                            <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>

                            <p> But nothing the copy said could convince her and so it didnâ€™t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>
                        </div>
                        <div class="tab-pane fade" id="line-subaru" role="tabpanel" aria-labelledby="line-subaru-tab">
                            <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>

                            <p> But nothing the copy said could convince her and so it didnâ€™t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>
                        </div>
                        <div class="tab-pane fade" id="line-toyota" role="tabpanel" aria-labelledby="line-toyota-tab">
                            <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>

                            <p> But nothing the copy said could convince her and so it didnâ€™t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>
                        </div>
                        <div class="tab-pane fade" id="line-nissan" role="tabpanel" aria-labelledby="line-nissan-tab">
                            <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>

                            <p> But nothing the copy said could convince her and so it didnâ€™t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function() {
            $("#add-row")
                .dataTable()
                .fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action,
                ]);
            $("#addRowModal").modal("hide");
        });
    });
</script>

@endsection