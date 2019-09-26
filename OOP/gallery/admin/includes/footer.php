  </div>
    <!-- /#wrapper -->
<!-- Scripts -->

       <script src="js/jquery.js"></script>
   <script src="js/scripts.js"></script>


<!-- Custom scripts -->

 


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<!-- WYSIWYG -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',     <?php echo $session->count;?> ],
          ['Photos',      <?php echo Photo::count_all();?>],
          ['Users',  <?php echo User::count_all();?>],
          ['Comments', <?php echo Comment::count_all();?>],
        ]);

        var options = {
          backgroundColor: 'transparent',
          pieSliceText: 'label',
          legend: 'none',
          title: 'Data'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
   
    </script>




</body>

</html>
