<link rel="stylesheet" href="style.css">
<form action="save.php" method="Post">
    <label for="fname">First Name :</label>
    <input type="text" name="FirstName" />
    <br>
    <label for="lname">Last Name:</label>
    <input type="text" name="LastName" />
    <br>
    <label for="address">Address:</label>
    <textarea name="Address"></textarea>
    <br>
    <label for="country">Country:</label>
    <select name="country">
        <option value="country">Cairo</option>
        <option value="country">Asuit</option>
        <option value="country">Alexandria</option>
    </select>
    <br>
    <label for="Gender">Gender:</label>
    <input type="radio" name="Gender" value="Male"> Male
    <input type="radio" name="Gender" value="Female"> Female
    <br>
    <label for="skills">Skills:</label>
    <input type="checkbox" name="skills[]" value="PHP"> PHP
    <input type="checkbox" name="skills[]" value="HTML"> HTML
    <input type="checkbox" name="skills[]" value="CSS"> CSS
    <br>
    <label for="username">Username:</label>
    <input type="text" name="username" />
    <br>
    <label for="department">Department:</label>
    <input type="text" name="department" value="OpenSource" readonly />
    <br>
    
    <input type="submit" value="Submit" />
    <input type="reset" value="Reset" />
    <a href="list.php">View List</a>
    <h3>View Student By ID</h3>

    <input type="number" id="viewId" placeholder="Enter ID">

    <a href="#" onclick="goToView()">View</a>
</form>

<script>
function goToView() {
    var id = document.getElementById("viewId").value;

    if (id.trim() === "") {
        alert("Please enter an ID");
        return;
    }

    window.location.href = "view.php?id=" + id;
}
</script>