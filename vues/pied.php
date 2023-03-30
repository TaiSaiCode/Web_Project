<style>
   
.pied {
    color: yellowgreen;
    position: absolute;
  margin: 100px auto 0;
  background-color: #393e46;
  height: 15%;
  top: 80%;
  padding: 16px 16px 0 16px;
  left: 0;
  right: 0;
  text-align: center;
}
</style>

<div class="pied">

   <div>
   <span id="dm"> Dernière modification</span>:
    <?php 
    echo "" . date ("l d-m-Y H:i:s.", filemtime("."));
    ?>

   </div>
</div>

<script>
   const text = document.getElementById('dm');
      
   let sousligne = false;

   setInterval(() => {
      text.style.textDecoration = sousligne ? "none" : "underline";
      sousligne = !sousligne; 
   }, 1000);
</script>