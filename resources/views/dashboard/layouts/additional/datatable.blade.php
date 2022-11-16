<script>
    var table = $('.table').DataTable({
        "orderCellsTop": true,
        "fixedHeader": true,
        "responsive":  true,
        "lengthChange": true,
        "pageLength": 25,
        "dom": 'lrtip',
        @if(Route::is('home.voters.index') )
            "scrollX": true,
            "scrollCollapse": true,
        @endif
        @if(Route::is('home.voters.index') )
            "order": [[ 7, 'desc' ]],
        @endif
        @if(Route::is('home.answer.index') )
            "order": [[ 6, 'desc' ]],
        @endif
    });

    @if(Route::is('home.voters.index') )
    $('.dataTables_scrollHead').clone().appendTo('.dataTables_scrollHead');
    @else
    $('.table thead tr').clone(true).appendTo( '.table thead' );
    @endif
    $('.table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
 
        $(this).html( '<input type="text" class="form-control" placeholder="'+title+'" />' );
        $(this).removeClass("sorting");
        $(this).removeClass("sorting_asc");
        // if (i == $(".table > tbody > tr:first > td").length -1) {
        //     $(this).find('input').hide();
        // }
        if (title == "Aksi" || title == "Action") {
            $(this).find('input').hide();
        }

        if (title == "Tanggal akun dibuat" || title == "Tanggal Input") {
            $(this).html( '<input type="date" class="form-control" />' );
            $('input', this).on('change', function () {
                if ( table.column(i).search() !== this.value) {
                table.column(i)
                        .search(this.value)
                        .draw();
                }
            });
            return;
        }

        if (title == "Sudah digunakan") {
            $(this).html(
                `<select class="form-control">
                    <option value="">`+title+`</option>
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
                </select>`
            );

            $('select', this).on('change', function () {
                if ( table.column(i).search() !== this.value) {
                table.column(i)
                        .search(this.value)
                        .draw();
                }
            });
            return;
        }

        if (title == "Device" || title == "Mata Uang") {
            $(this).html(
                `<select class="form-control">
                    <option value="">`+title+`</option>
                    <option value="desktop">Desktop</option>
                    <option value="tablet">Tablet</option>
                    <option value="mobile">Mobile</option>
                </select>`
            );

            $('select', this).on('change', function () {
                if ( table.column(i).search() !== this.value) {
                table.column(i)
                        .search(this.value)
                        .draw();
                }
            });
            return;
        }

        if (title == "No.1" || title == "No.2" || title == "No.3" || title == "No.4") {
            $(this).html(
                `<select class="form-control">
                    <option value="">`+title+`</option>
                    <option value="Benar">Benar</option>
                    <option value="Salah">Salah</option>
                </select>`
            );

            $('select', this).on('change', function () {
                if ( table.column(i).search() !== this.value) {
                table.column(i)
                        .search(this.value)
                        .draw();
                }
            });
            return;
        }

        if (title == "Status Email" || title == "Type") {
            $(this).html(
                `<select class="form-control">
                    <option value="">`+title+`</option>
                    <option value="1">Sukses</option>
                    <option value="0">Gagal</option>
                </select>`
            );

            $('select', this).on('change', function () {
                if ( table.column(i).search() !== this.value) {
                table.column(i)
                        .search(this.value)
                        .draw();
                }
            });
            return;
        }

        if (title == "Jenis Kelamin" || title == "Type") {
            $(this).html(
                `<select class="form-control">
                    <option value="">`+title+`</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>`
            );

            $('select', this).on('change', function () {
                if ( table.column(i).search() !== this.value) {
                table.column(i)
                        .search(this.value)
                        .draw();
                }
            });
            return;
        }

        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
            table
                .column(i)
                .search(this.value)
                .draw();
            }
        });
    });
</script>
<script>
    function parseDateValue(rawDate) {
      var dateArray= rawDate.split("/");
      var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
      return parsedDate;
    }
</script>