<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CP School</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; }
    header { background: linear-gradient(to right, #000000, #1a1a1a); color: white; display: flex; align-items: center; justify-content: space-between; padding: 1rem 2rem; flex-wrap: wrap; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); }
    .logo { font-size: 1.8rem; font-weight: bold; color: orange; text-decoration: none; }
    nav { display: flex; gap: 1rem; align-items: center; flex-wrap: wrap; }
    nav a { text-decoration: none; color: white; padding: 0.4rem 0.8rem; border-radius: 5px; font-weight: bold; transition: all 0.3s ease; background-color: rgba(255, 255, 255, 0.05); }
    nav a:hover { background-color: orange; color: #000; box-shadow: 0 2px 8px rgba(255, 115, 0, 0.6); }
    .dropdown { position: relative; }
    .dropdown a { cursor: pointer; }
    .dropdown-menu { display: none; position: absolute; top: 100%; left: 0; background-color: #333; padding: 0.5rem; border-radius: 5px; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3); z-index: 10; }
    .dropdown:hover .dropdown-menu { display: block; }
    .dropdown-menu a { display: block; padding: 0.5rem 1rem; color: white; text-decoration: none; font-weight: bold; transition: all 0.3s ease; }
    .dropdown-menu a:hover { background-color: orange; color: #000; }
    .search-bar { position: relative; margin-top: 0.5rem; display: flex; flex-direction: column; gap: 0.5rem; }
    .search-bar input { padding: 0.5rem 1rem; border: 2px solid orange; border-radius: 25px; outline: none; transition: 0.3s; width: 180px; background: #fff; color: #333; }
    .search-bar button { background: linear-gradient(135deg, #ff9500, #ff6100); border: none; padding: 0.5rem 1.2rem; color: white; font-weight: bold; border-radius: 25px; cursor: pointer; transition: background 0.3s, transform 0.3s, box-shadow 0.3s; box-shadow: 0 2px 6px rgba(255, 115, 0, 0.4); }
    .search-bar button:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(255, 136, 0, 0.6); background: linear-gradient(135deg, #ff7b00, #e65200); }
    .suggestions { position: absolute; top: 110%; left: 0; background: #fff; border: 2px solid orange; border-radius: 10px; width: 100%; z-index: 999; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); display: none; max-height: 200px; overflow-y: auto; font-weight: bold; color: #333; }
    .suggestions div { padding: 0.5rem 1rem; cursor: pointer; transition: all 0.25s ease; color: #333; background-color: #fff; }
    .suggestions div:hover { background-color: orange; color: white; }

    .carousel { position: relative; max-width: 100%; overflow: hidden; }
    .slides { display: flex; transition: transform 0.5s ease-in-out; }
    .slide { min-width: 100%; position: relative; height: 100vh; }
    .slide img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .text-overlay { position: absolute; top: 20%; left: 5%; color: white; max-width: 50%; }
    .text-overlay h1 { font-size: 3rem; }
    .text-overlay span { color: orange; font-size: 3.5rem; }
    .text-overlay p { font-size: 1.2rem; margin-top: 1rem; }

    .dots-container {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }
    .dot {
      width: 12px;
      height: 12px;
      background-color: #fff;
      border-radius: 50%;
      cursor: pointer;
      opacity: 0.6;
    }
    .dot.active {
      background-color: orange;
      opacity: 1;
    }

    @media screen and (max-width: 1024px) {
      .text-overlay { max-width: 70%; }
      .text-overlay h1, .text-overlay span { font-size: 2.5rem; }
      .text-overlay p { font-size: 1.1rem; }
    }
    @media screen and (max-width: 768px) {
      header { flex-direction: column; align-items: flex-start; }
      nav { margin-top: 0.5rem; flex-direction: column; }
      .search-bar { width: 100%; }
      .search-bar input { width: 100%; max-width: 220px; }
      .text-overlay { max-width: 90%; top: 15%; }
      .text-overlay h1, .text-overlay span { font-size: 2rem; }
      .text-overlay p { font-size: 1rem; }
      .slide { height: 70vh; }
    }
    @media screen and (max-width: 480px) {
      .text-overlay h1, .text-overlay span { font-size: 1.5rem; }
      .text-overlay p { font-size: 0.9rem; }
      nav { flex-direction: column; gap: 0.5rem; }
    }
    .carousel {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.slides {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.slide {
  min-width: 100%;
  position: relative;
  height: 100vh;
}

.slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

@media screen and (max-width: 1024px) {
  .slide {
    height: 75vh;
  }
}

@media screen and (max-width: 768px) {
  .slide {
    height: 60vh;
  }
}

@media screen and (max-width: 480px) {
  .slide {
    height: auto;
  }

  .slide img {
    height: auto;
    object-fit: contain;
  }

  .text-overlay {
    top: 10%;
    max-width: 95%;
  }

  
}
  </style>
</head>
<body>
  <header>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="logo">CP School</a>
    <nav>
      <div class="dropdown">
        <a href="javascript:void(0)">Languages</a>
        <div class="dropdown-menu">
          <a href="C.html">C</a>
          <a href="C++.html">C++</a>
          <a href="Python.html">Python</a>
          <a href="go.html">Go</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="javascript:void(0)">Standard Library Template</a>
        <div class="dropdown-menu">
          <a href="stl_intro.html">Introduction</a>
          <a href="stl_algorithms.html">Algorithms</a>
          <a href="stl_containers.html">Containers</a>
          <a href="stl_iterators.html">Iterators</a>
        </div>
      </div>
      <a href="Number_theory.html">Number Theory</a>
      <a href="Graph.html">Graph</a>
      <a href="Tree.html">Tree</a>
      <a href="DP.html">Dynamic Programming</a>
    </nav>

    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Type to search..." autocomplete="off" />
      <button onclick="handleSearch()">Search</button>
      <div class="suggestions" id="suggestions"></div>
    </div>
  </header>

  <section class="carousel">
    <div class="slides" id="slide-container">
      <div class="slide">
        <img src="image/imagec2.jpg" alt="slide1" />
        <div class="text-overlay">
          <h1>CP Learning & <br /><span>Web Design</span></h1>
          <p>CP School, a place of learning and delight,<br />Where algorithms and code take flight.</p>
        </div>
      </div>
      <div class="slide">
        <img src="image/joker.jpg" alt="slide2" />
        <div class="text-overlay">
          <h1>Unlock the <br /><span>Power of Code</span></h1>
          <p>Join a community that helps you grow,<br />From basics to pro..</p>
        </div>
      </div>
      <div class="slide">
        <img src="image/pexels-divinetechygirl-1181279.jpg" alt="slide3" />
        <div class="text-overlay">
          <h1>Learn With <br /><span>Real Projects</span></h1>
          <p>Watch your skills flow with structured growth,<br />One lesson at a time.</p>
        </div>
      </div>
    </div>
    <div class="dots-container" id="dots"></div>
  </section>

  <script>
    const searchInput = document.getElementById("searchInput");
    const suggestionsBox = document.getElementById("suggestions");
    const suggestionItems = {
      "C": "C.html", "C++": "C++.html", "Python": "Python.html", "Go": "go.html",
      "Standard Library Template": "stl_intro.html", "Introduction": "stl_intro.html",
      "Algorithms": "stl_algorithms.html", "Containers": "stl_containers.html",
      "Iterators": "stl_iterators.html", "Number Theory": "Number_theory.html",
      "Graph": "Graph.html", "Tree": "Tree.html", "Dynamic Programming": "DP.html"
    };

    searchInput.addEventListener("input", function () {
      const inputVal = this.value.toLowerCase();
      suggestionsBox.innerHTML = "";
      if (inputVal.length === 0) return suggestionsBox.style.display = "none";
      const filteredSuggestions = Object.keys(suggestionItems).filter(item =>
        item.toLowerCase().includes(inputVal));
      if (!filteredSuggestions.length) return suggestionsBox.style.display = "none";
      filteredSuggestions.forEach(item => {
        const div = document.createElement("div");
        div.textContent = item;
        div.addEventListener("click", function () {
          searchInput.value = item;
          window.location.href = suggestionItems[item];
        });
        suggestionsBox.appendChild(div);
      });
      suggestionsBox.style.display = "block";
    });

    document.addEventListener("click", function (e) {
      if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
        suggestionsBox.style.display = "none";
      }
    });

    function handleSearch() {
      const query = searchInput.value.trim();
      if (query === "") return;

      // Send search term to backend
      fetch("store_search.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `query=${encodeURIComponent(query)}`
      });

      if (suggestionItems[query]) {
        window.location.href = suggestionItems[query];
      } else {
        alert("No matching page found.");
      }
    }

    // Carousel Logic
    let slideIndex = 0;
    const slides = document.querySelectorAll(".slide");
    const dotsContainer = document.getElementById("dots");

    function showSlide(index) {
      const slideWidth = slides[0].clientWidth;
      document.getElementById("slide-container").style.transform = `translateX(-${index * slideWidth}px)`;
      document.querySelectorAll(".dot").forEach((dot, i) => {
        dot.classList.toggle("active", i === index);
      });
    }

    function initDots() {
      for (let i = 0; i < slides.length; i++) {
        const dot = document.createElement("div");
        dot.className = "dot";
        dot.addEventListener("click", () => {
          slideIndex = i;
          showSlide(slideIndex);
        });
        dotsContainer.appendChild(dot);
      }
    }

    window.addEventListener('resize', () => {
  showSlide(slideIndex);
});


    function autoSlide() {
      slideIndex = (slideIndex + 1) % slides.length;
      showSlide(slideIndex);
    }

    initDots();
    showSlide(slideIndex);
    setInterval(autoSlide, 4000);

    fetch("store_visit.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `page=${encodeURIComponent(window.location.pathname)}`
    });

  </script>
</body>
</html>
