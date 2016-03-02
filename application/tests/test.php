<script>
    Array.prototype.pushUnique = function(item){
        if(this.indexOf(item) == -1) {
            return this.push(item);
        }else{
            return false;
        }
    };
    var cat_parent = [];
    var getList = function(ruleList, ruleText, ruleLink, callback) {
        var arr = [];
        $(ruleList).each(function(index, item){
            arr.pushUnique({
                link : $(this).find(ruleLink).attr('href'),
                text : $(this).find(ruleText).text(),
                item : $(this)
            });
        });
        if(callback) {
            callback(arr);
        }else{
            return arr;
        }
    };
    getList('.navL1','span', '>a' ,function(listParent){
        listParent.forEach(function(cat_p){
            getList(cat_p.item.find('ul li'), 'a', 'a', function(listChild){
                var arr_child = [];
                listChild.map(function(item){
                    arr_child.pushUnique(item.text);
                    return item;
                });
                cat_parent.pushUnique({
                    name : cat_p.text,
                    child : arr_child
                })
            });
        })
    });
    console.log(cat_parent);
    function sendList(url, data, action) {
        $.ajax({
            type : 'post',
            url : url,
            data : {data : data, action : action},
            dataType : "json",
            success : function(resp) {
                if(resp.success) {
                    console.log(resp.data);
                }else{
                    console.log(resp.error);
                }
            }
        })
    }
    sendList('http://localhost:8035/tests/save.php',cat_parent, 'save_cat');
</script>