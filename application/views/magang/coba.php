<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Select Option using Codeigniter and Ajax</title>
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
 
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <h3>Product Form:</h3>
            <form>
                   <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="unit" id="unit" required>
                        <option value="">No Selected</option>
                        <?php foreach($unit as $row):?>
                        <option value="<?php echo $row->id_unit;?>"><?php echo $row->name_unit;?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sub Category</label>
                    <select class="form-control" id="sub_unit" name="sub_unit" required>
                        <option>No Selected</option>
 
                    </select>
                  </div>
            </form>
        </div>
      </div>
 
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
 
            $('#unit').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('magang/get_sub_unit');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_sub+'>'+data[i].name_sub_unit+'</option>';
                        }
                        $('#sub_unit').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>
</body>
</html>