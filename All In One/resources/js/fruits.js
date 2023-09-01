$(document).ready(function () {
    $('.actions').click(function () {
        var fruitIds = $(this).attr("data-fruitId");
        $.ajax({
            url: `api/fruits/${fruitIds}`,
            success: function (data) {
                if(data['status'] == 'added'){
                    console.log(this);
                    $('.actions[data-fruitId = '+fruitIds+']').addClass('added');
                }else if(data['status'] == 'remove'){
                    console.log("remove");
                    $('.actions[data-fruitId = '+fruitIds+']').removeClass('added');
                }
            }
        });
    });

    $('#searchFruit').keyup(function () {
    // $('#searchFruitBtn').click(function () {
        var fruitname = $('#searchFruit').val();
        $('#tbody tr').html("");
        $.ajax({
            url: `/findFruits/${fruitname}`,
            success: function (data) {
                console.log(data);
                $.each(data , function(key, value){
                    var item = `<tr>
                    <td>${value.id}</td>
                    <td>${value.fruit_id}</td>
                    <td>${value.genus}</td>
                    <td>${value.name}</td>
                    <td>${value.family}</td>
                    <td>${value.order}</td>
                    <td>${value.protein}</td>
                    <td>${value.carbohydrates}</td>
                    <td>${value.fat}</td>
                    <td>${value.calories}</td>
                    <td>${value.sugar}</td>
                    <td>
                    <div class="btnDiv">
                    <div data-fruitId="${value.fruit_id}"
                    class="actions'+ value +'$value.favourite_flag == 1 ? 'added' : '' }}"><svg width="50"
                    height="48" viewBox="0 0 50 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M41.8009 29.2533C40.7334 30.2842 40.2484 31.77 40.4984 33.2271L42.1109 42.5509C42.6134 45.4533 40.2884 47.8105 37.6509 47.8105C36.9559 47.8105 36.2384 47.6462 35.5434 47.2843L27.1059 42.8819C26.4459 42.539 25.7234 42.3676 24.9984 42.3676C24.2759 42.3676 23.5534 42.539 22.8934 42.8819L14.4559 47.2843C13.7609 47.6462 13.0434 47.8105 12.3484 47.8105C9.71088 47.8105 7.38589 45.4533 7.88839 42.5509L9.50089 33.2271C9.75089 31.77 9.26588 30.2842 8.19838 29.2533L1.37088 22.6509C-1.31413 20.0533 0.168383 15.5271 3.87839 14.9914L13.3134 13.6319C14.7884 13.42 16.0634 12.5009 16.7209 11.1748L20.9409 2.69377C21.7709 1.02473 23.3859 0.191406 24.9984 0.191406C26.6134 0.191406 28.2284 1.02473 29.0584 2.69377L33.2784 11.1748C33.9359 12.5009 35.2109 13.42 36.6859 13.6319L46.1209 14.9914C49.8309 15.5271 51.3134 20.0533 48.6284 22.6509L41.8009 29.2533Z"
                    fill="#717579" />
                    </svg></div>
                    </div>
                    </td>
                    </tr>`;
                    $('#tbody').append(item);
                });
                // if(data['status'] == 'find'){
                // if(data){
                //     console.log("find");
                // // }else if(data['status'] == 'notfind'){
                // }else {
                //     console.log("notfind");
                // }
            }
        });
    });
});