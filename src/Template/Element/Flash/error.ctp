
<?php echo $this->Html->css('notiny.min.css');?>

<?php 

    echo $this->Html->script('https://code.jquery.com/jquery-2.1.3.min.js');
    echo $this->Html->script('notiny.min.js');
?>
<style>
    .notiny-theme-dark {
      background-color: #d33c44;
      color: #f5f5f5;
    }
    
</style>
<div style="color: red;" class="message error" onclick="this.classList.add('hidden');">
    <script type="text/javascript">
       
        
        $(document).ready( function() {
            
                
                
            $.notiny({ text: '<?php print $message; ?>', image: 'https://octodex.github.com/images/privateinvestocat.jpg' });
            return false;
         
            $.notiny.addTheme('light', {
              notification_class: 'notiny-theme-light notiny-default-vars'
            });
          
            
          
        });
    </script>
    
</div>