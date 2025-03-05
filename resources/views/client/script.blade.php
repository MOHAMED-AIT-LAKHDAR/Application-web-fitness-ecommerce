<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();
        var utlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(utlToRedirect);
        swal({
                title: "Are you sure you want to delete this Item ?",
                text: "You  won't be able to revert this delete ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = utlToRedirect;
                }
            });
    }
</script>

<script>
    $(document).ready(function() {
        loadpanier();
        loadwishlist();
        $('.addtopanier').click(function(e) {
            var isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
            if (isAuthenticated) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qte').val();


                $.ajax({
                    method: "POST",
                    url: "/panier",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function(response) {
                        swal(response.status);
                        loadpanier();
                    }
                });
            } else {
                swal("Client is not authenticated. Please login.");

            }

        });

        $('.addtowishlist').click(function(e) {
            var isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
            if (isAuthenticated) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                $.ajax({
                    method: "POST",
                    url: "/add_wishlist",
                    data: {
                        'product_id': product_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        swal(response.status);
                        loadwishlist();
                    }
                });
            } else {
                swal("Client is not authenticated. Please login.");

            }

        });

        function loadpanier() {
            var isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
            if (isAuthenticated) {
                $.ajax({
                    method: "GET",
                    url: "/load_panier_data",
                    success: function(response) {
                        $('.panier-count').html('');
                        $('.panier-count').html(response.count);

                    }
                })

            }
        }

        function loadwishlist() {
            var isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
            if (isAuthenticated) {

                $.ajax({
                    method: "GET",
                    url: "/load_wishlist_data",
                    success: function(response) {
                        $('.wishlist-count').html('');
                        $('.wishlist-count').html(response.count);


                    }
                })
            }

        }
    });



    $('.remove-wishlist-item').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "POST",
            url: "/delete_wishlist_item",
            data: {
                'product_id': product_id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                setTimeout(function() {
                    window.location.reload();
                }, 2000); // Reload after 2 seconds (2000 milliseconds)
                swal("", response.status, "success");
            }
        });
    });



    $('.increment').click(function(e) {
        e.preventDefault();

        // var inc_val = $('.qte').val();
        var inc_val = $(this).closest('.product_data').find('.qte').val();
        var val = parseInt(inc_val, 10);
        val = isNaN(val) ? 0 : val; // Fix: Change 'inNaN' to 'isNaN'
        if (val < 10) {
            val++;
            $(this).closest('.product_data').find('.qte').val(val);
        }
    });
    $('.decrement').click(function(e) {
        e.preventDefault();
        var inc_val = $(this).closest('.product_data').find('.qte').val();
        var val = parseInt(inc_val, 10);
        val = isNaN(val) ? 0 : val; // Fix: Change 'inNaN' to 'isNaN'
        if (val > 1) {
            val--;
            $(this).closest('.product_data').find('.qte').val(val);
        }
    });
    // $('.delete-item').click(function(e) {
    //     e.preventDefault();
    //     var product_id = $(this).closest('.product_data').find('.prod_id').val();


    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         method: "POST",
    //         url: "/delete_item",
    //         data: {
    //             'product_id': product_id,
    //         },
    //         success: function(response) {


    //         }
    //     });
    // });

    $('.changequantity').click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var qte = $(this).closest('.product_data').find('.qte').val();
        data = {
            'prod_id': product_id,
            'prod_qty': qte,
        };
        $.ajax({
            method: "POST",
            url: "/update_item",
            data: data,
            success: function(response) {
                window.location.reload();

            }
        });

    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- <script>
    var alertElement = document.getElementById('myAlert');

    setTimeout(function() {
        alertElement.style.display = 'none';
    }, 2000);
</script> --}}

{{-- filter --}}

<script>
    $(document).ready(function() {
        $('#filter-form').submit(function(event) {
            event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

            // Récupérer les valeurs sélectionnées dans le formulaire
            var category = $('input[name="category[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            var minPrice = $('#min_price').val();
            var maxPrice = $('#max_price').val();
            var size = $('input[name="size[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            var grams = $('input[name="grams[]"]:checked').map(function() {
                return $(this).val();
            }).get();
            console.log("Category: " + category + ", Min Price: " + minPrice + ", Max Price: " +
                maxPrice + ", Size: " + size + ", Grams: " + grams);

            // Envoyer une requête AJAX au serveur pour filtrer les produits
            $.ajax({
                type: 'GET',
                url: "{{ route('product.filter') }}",
                data: {
                    category: category,
                    min_price: minPrice,
                    max_price: maxPrice,
                    size: size,
                    grams: grams // Envoyer les grammes sélectionnés
                },
                success: function(response) {
                    // Mettre à jour le contenu du conteneur de produits avec les produits filtrés
                    $('#products-container').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>

    <script>
    $(function() {
        $("#search_product").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('products.autocomplete') }}",
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.name, // Le nom à afficher dans la liste
                                value: item.id // La valeur associée au champ de saisie lors de la sélection
                            };
                        }));
                    }
                });
            },
            minLength: 2 // Nombre minimum de caractères avant de déclencher l'autocomplétion
        });
    });
</script>



@yield('script')
