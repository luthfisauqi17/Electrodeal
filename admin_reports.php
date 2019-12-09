<?php include("admin_template/header.php"); ?>

    <h2 class="title">Reports</h2>

    <div class="row">
        <div class="col-25">    
            <button onclick="generateReportFileAjax();" class="save_report_btn">Save Report</button>
            <p style="margin-left: 1rem;">Current report file location: <strong>C:\xampp\htdocs\electrodeal\transaction_report.txt</strong></p>
            <div style="margin-left: 1rem;" id="res"></div>
        </div>
    </div>

    <div class="row">
        <a href="admin_reports.php"><button class="load_report_btn">Load Report</button></a>
        <textarea id="" name="" placeholder="" style="height:400px"><?php echo shell_exec("cd C:\\xampp\\htdocs\\electrodeal & more transaction_report.txt")?></textarea>
        
    </div>

<?php include("admin_template/footer.php"); ?>

<script>
    function generateReportFileAjax() {

        x = new XMLHttpRequest();
        x.open("GET","generate_report_file.php", true) 
        x.send();
        x.onreadystatechange=stateChanged;
    }
    function stateChanged() { 
        if (x.readyState==4) { 
            document.getElementById("res").innerHTML = "File Created Successfully";
        }
    }
</script>