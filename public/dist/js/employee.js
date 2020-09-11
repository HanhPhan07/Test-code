// $(document).ready(function(){
//     baseUrl = window.location.origin;
//     $('#btnCancel').click(function(){
//         $('#date_from').val('');
//         $('#date_to').val('');
//         $('#email').val('');
//     });
//     $('#btnsearch').click(function(e){
//         e.preventDefault();
//         $date_from=$('#date_from').val();
//         $date_to=$('#date_to').val();
//         $email=$('#email').val();
//         if($date_from==''||$date_to==''){
//             $('#error').html('You must enter value');
//         }
//         else{
//             $.ajax({
//                 // headers: {
//                 //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 // },
//                 url: baseUrl+ 'search',
//                 type: 'GET',
//                 data: {
//                     date_from: date_from,
//                     date_to: date_to,
//                     email:email
//                 },
//                 success:function(result){
//                     console.log(abc);
//                     // var json_data = $.parseJSON(result);
//                     // if(json_data.status==1){
//                     //     // $('#PlayExam').modal('hide');
//                     //     // alert('Phát đề thành công');
//                     //     location.reload();
//                     // }
//                     // else{
//                     //     alert('lỗi');
//                     //     // $('#PlayExam').modal('hide');
//                     // }
//                     // // console.log(data);
//                     // //location.reload();
//                 },
//                 error: function(){
//                     alert('Error! try it again');
//                 }
//             });
//         }
//     });
// });


$(document).ready(function() {
    baseUrl = window.location.origin;
    $('#btnCancel').click(function(e) {
        e.preventDefault();
        $('#date_from').val('');
        $('#date_to').val('');
        $('#email').val('');
        // $('#test-dl').removeClass('show').addClass('hide');
    });
    // $('#date_from').focus(function() {
    //     $('#inputTS').removeClass("has-error");
    //     $('.inputTS').html('Over or equal >=');
    // });
    // $('#inputTimeFinish').focus(function() {
    //     $('#inputTF').removeClass("has-error");
    //     $('.inputTF').html('Under <');
    // });
    $('.btnsearch').click(function(e) {
        e.preventDefault();
        e.preventDefault();
        var date_from=$('#date_from').val();
        var date_to=$('#date_to').val();
        var email=$('#email').val();
        if (date_from <= 0 || date_from.length == 0) {
            $('#error').html('You must enter value');
        }
        if (date_to <= 0 || date_to.length == 0) {
            $('#error').html('You must enter value');
        }
        if (date_from > date_to) {
            $('#error').html('Invalid value');
        }
        if (date_from == date_to) {
            $('#error').html('invalid value');
        }
        if ((date_from > 0 || date_from.length != 0) && (date_to >= 0 || date_to.length != 0) && (date_from < date_to)) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: baseUrl + "/search",
                data: {
                    date_from: date_from,
                    date_to: date_to,
                    email: email
                },
                dataType: "json",
                success: function(data) {
                    // let json_data = $.parseJSON(data);
                    //console.log(data);
                    if (data['count'] > 0) {
                        $("#error").addClass('hide');
                        let tbody = $('#data');
                        tbody.empty();
                        for (let i = 0; i < data['count']; i++) {
                            let tr = $('<tr></tr>')
                            tr.append('<td>' + data[i].StaffID + '</td>' +
                                '<td>' +data[i].StaffName + '</td>' +
                                '<td>' + data[i].JapaneseName + '</td>' +
                                '<td>' + data[i].Email + '</td>' +
                                '<td>' + data[i].TrialEntryDate + '</td>' +
                                '<td>' + data[i].QuitJobDate + '</td>');
                            tbody.append(tr);
                        }
                        $('#first_data').removeClass('show').addClass('hide');
                        $('#data_test').removeClass('hide').addClass('show');
                    } else {
                        $("#error_message").html(
                            '<div class="callout callout-danger">' +
                            "<h4>  Sorry ! </h4>" +
                            "No data available" +
                            "</tr>"
                        );
                    }



                },
            });
        }



    });

});
