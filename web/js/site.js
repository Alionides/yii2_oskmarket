$(document).ready(function() {

    
    var example_table =  $('#table').DataTable({
        //'deferRender': false,
        'ajax'       : {
          "type"   : "POST",
          "url"    : 'http://localhost/basic/web/index.php?r=site/getuserdata',
          "dataSrc": function (json) {
            var return_data = new Array();
            for(var i=0;i< json.length; i++){
                $.ajax({
                    url:'http://localhost/basic/web/index.php?r=site/getcity',
                    type:'post',
                    async: false,
                    data:{city_id:json[i].city_id},
                    success:function(e){
                            //console.log(e['name']);
                            cityname = e['name'];
                    }
                });
                options = '<select>';
                $.ajax({
                    url:'http://localhost/basic/web/index.php?r=site/getuserskills',
                    type:'post',
                    async: false,
                    data:{user_id:json[i].id},
                    success:function(e){
                        for(var i=0;i< e.length; i++){

                            skills = e[i]['name'];
                            options += '<option>'+skills+'</option>';
                        }
                            
                            //console.log(e);
                    }
                });
                
                options += '</select>';
              return_data.push({
                'name': json[i].name,
                'cityname'  : cityname,
                'skills' : options,
                'button' : '<button data-userid="'+json[i].id+'" class="btn btn-danger click">delete</button>',
              })
            }
            return return_data;
          }
        },
        "columns"    : [
          {'data': 'name'},
          {'data': 'cityname'},
          {'data': 'skills'},
          {'data': 'button'},
          
        ]
      });

      $('.test').click(function(){
          $.ajax({
              url:'http://localhost/basic/web/index.php?r=site/addrandomuser',
              type:'post',
              data:{},
              success:function(e){     
                example_table.ajax.reload();  
              }
          });       

      });

      $("#table").on("click",".click", function(){

        
        var userid = $(this).data('userid');

        $.ajax({
            url:'http://localhost/basic/web/index.php?r=site/deleteuser',
            type:'post',
            //async: false,
            data:{user_id:userid},
            success:function(e){               
                    
            example_table.ajax.reload();  

            }
        });
        

      });





    // $('#table').DataTable( {
    //     //autoFill: true
    //     //"pageLength": 2,
    //     "ajax": 'http://localhost/basic/web/index.php?r=site/getuserdata'
    // } );


    // $('.test').click(function(){
    //     $.ajax({
    //         url: 'http://localhost/basic/web/index.php?r=site/getuserdata',
    //         type: 'get',
    //         //data: {},
    //             success:function(emp){
    //             //console.log(emp);
    //             var len = emp.length;
    //             var options = "";
    //             //var cityname = "";
    //                 for( var i = 0; i<len; i++){
    //                     var name = emp[i]['name'];
    //                     var city_id = emp[i]['city_id'];
    //                     console.log(city_id);
    //                     $.ajax({
    //                         url:'http://localhost/basic/web/index.php?r=site/getcity',
    //                         type:'post',
    //                         async: false,
    //                         data:{city_id:city_id},
    //                         success:function(e){
    //                              //console.log(e['name']);
    //                              cityname = e['name'];
    //                         }
    //                     });
    //                     options += "<tr ><td>"+name+"</td><td>"+cityname+"</td><td><button class='btn btn-danger'>del</button></td></tr>";
    //                 } 
    //                 $(".alldata").empty();
    //                 $(".alldata").append(options);

    //             }
    //     });

    // });





} );