<?php echo $this->Html->css('notiny.min.css');?>

<?php 

    echo $this->Html->script('https://code.jquery.com/jquery-2.1.3.min.js');
    echo $this->Html->script('notiny.min.js');
?>

<div style="color: #fff;" class="message success" onclick="this.classList.add('hidden')">
 <script type="text/javascript">
       
        
        $(document).ready( function() {
            
                
                
            $.notiny({ text: '<?php print $message; ?>', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
            return false;
         
          
          
            
          
        });
    </script>
    
    </div>