function changetype()
{
	window.location.href="admin.php?qtype="+document.getElementById("qtype").value;
}

var select = document.getElementById("qtype")
select.addEventListener("change", changetype;