<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <form id="form1" name="form1" method="post" action="">
            <table id="myTbl" width="650" border="1" cellspacing="2" cellpadding="0">
            <tr id="firstTr">
                <td width="119">
                    <select name="data1[]" id="data1[]">
                    <option value="1">data1</option>
                    <option value="2">data2</option>
                    </select>
                </td>
                <td width="519"><input type="text" name="data2[]" id="data2[]" /></td>
                </tr>
            </table>
            <br />
            <table width="500" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                <button id="addRow" type="button">+</button>&nbsp;
                <button id="removeRow" type="button">-</button>
                &nbsp;
                &nbsp;
                &nbsp;
                <button id="Submit" type="submit">Submit</button>    
                </td>
            </tr>
            </table>
        </form>
        <pre><?php print_r($_POST["data1"]);?></pre>
        <pre><?php print_r($_POST["data2"]);?></pre>
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script type="text/javascript">
    $(function(){
        $("#addRow").click(function(){
            $("#myTbl").append($("#firstTr").clone());
        });
        $("#removeRow").click(function(){
            if($("#myTbl tr").size()>1){
                $("#myTbl tr:last").remove();
            }else{
                alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");
            }
        });         
    });
    </script>
    </body>
</html>