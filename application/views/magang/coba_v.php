<!DOCTYPE html>
<html>
<head>
    <title>Select berhubungan dengan codeigniter dan ajax</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
    <br/>
    <div class="col-md-6 col-md-offset-3">
        <div class="thumbnail">
            <h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-3">Unit</label>
                    <div class="col-md-8">
                        <select name="unit" id="unit" class="form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->id_unit;?>"><?php echo $row->name_unit;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Sub Unit</label>
                    <div class="col-md-8">
                        <select name="subunit" class="subunit form-control">
                            <option value="0">-PILIH-</option>
                        </select>
                    </div>
                     
                </div>
            </form>
            <hr/>
            <p style="text-align: center;">Powered by <a href="">mfikri.com</a></p>
        </div>
    </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#unit').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>magang/get_sub_unit",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].name_sub_unit+'</option>';
                    }
                    $('.subunit').html(html);
                     
                }
            });
        });
    });
</script>
</body>
</html>