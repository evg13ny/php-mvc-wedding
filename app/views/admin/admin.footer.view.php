</main>
</div>
</div>

<script>
  let links = document.querySelectorAll(".nav a")
  for (let i = 0; i < links.length; i++) {
    if (window.location.href === links[i].href) {
      links[i].classList.add("active")
    }
  }
</script>

</body>

</html>