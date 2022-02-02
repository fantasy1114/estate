<html>
    {{-- HEAD --}}

    @include('layouts.header')
    
    {{-- HEAD --}}
    <body>
        <div class="content-wrapper">
            @foreach ($items as $item)
            
                <div class="content-body">
                    <div class="d-flex justify-content-center mt-3">
                        <div class="col-md-4 col-sm-6 col-12 card p-3">
                            <form class="application_form">
                                <h3>People moving in</h3>
                                <div class="form-group">
                                    <label class="form-label" for="aduilt_num">How many adults are there?</label>
                                    <input type="number" class="form-control" id="aduilt_num"
                                    placeholder="2" name="aduilt_num" aria-label="aduilt_num"
                                    aria-describedby="aduilt_num" min="0"/>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="child_num">How many Children are there?</label>
                                    <input type="number" class="form-control" id="child_num"
                                    placeholder="2" name="child_num" aria-label="child_num"
                                    aria-describedby="child_num" min="0"/>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="parking_space">Would you like a parking space for your car (160CHF / month)?</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="parking_space1" name="parking_space" class="custom-control-input" checked />
                                        <label class="custom-control-label" for="parking_space1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="parking_space2" name="parking_space" class="custom-control-input" />
                                        <label class="custom-control-label" for="parking_space2">No</label>
                                    </div>
                                </div>
                                <h3>Pets / Musical Instruments</h3>
                                <div class="form-group">
                                    <label class="form-label" for="pets_own">Do you own pets?</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="pets_own1" name="pets_own" class="custom-control-input" checked />
                                        <label class="custom-control-label" for="pets_own1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="pets_own2" name="pets_own" class="custom-control-input" />
                                        <label class="custom-control-label" for="pets_own2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="instruments">Do you own playing musical instruments in the apartment?</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="instruments1" name="instruments" class="custom-control-input" checked />
                                        <label class="custom-control-label" for="instruments1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="instruments2" name="instruments" class="custom-control-input" />
                                        <label class="custom-control-label" for="instruments2">No</label>
                                    </div>
                                </div>
                                <h3>Further information</h3>
                                <div class="form-group">
                                    <label class="form-label" for="instruments">What is the main reason for your change of residence?</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="instruments" rows="3" placeholder="Textarea"></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Reset</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                
            @endforeach
            
        </div>
        @include('layouts.footer')
        <script>
            $(function(){
                $('.application_form').on("submit", function (e) {
                    var formData = new FormData(this);
                    e.preventDefault();
                    alert('submitted');
                    // $.ajax({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     type: 'post',
                    //     url: url,
                    //     cache: false,
                    //     data: formData,
                    //     contentType: false,
                    //     processData: false,
                    //     success: function (data) {
                    //         if (data['success']) {
                    //             window.location.reload();
                    //         }
                    //         else {
                    //             console.log('error');
                    //         }
                    //     }
                    // })
                });
            })
        </script>
    </body>
</html>