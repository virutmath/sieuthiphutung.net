<script>
    var array_url = [];
    $('.p-list-border').find('li').each(function (index, item) {
        var link = $(item).find('h3 a');
        var title = $.trim(link.text());
        var url = link.attr('href');
        array_url.push(url);
    });
    var products = [];
    var crawler = setInterval(function(){
        var url = array_url.pop();
        if(url) {
            $.get(url, function (data) {
                var new_dom = $(data);
                var price = new_dom.find('.pd-price-real');
                if(price.find('.colorRed').length) {
                    price = price.find('.ColorRedBold').text();
                    price = price.replace(',','');
                }else{
                    price = 0;
                }
                var product = {
                    name : new_dom.find('h1.pd-title').text(),
                    price : price,
                    description : new_dom.find('.pd-des-content').html()
                };
                console.log(product.name, product.price);
                products.push(product);
            })
        }else{
            clearInterval(crawler);
        }
    },3000);
    $.ajax({
        type : 'post',
        url : 'http://localhost:8035/tests/save.php',
        data : {products : products},
        dataType : 'json',
        success : function (resp) {
            console.log(resp);
        }
    })
</script>