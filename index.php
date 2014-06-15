<!DOCTYPE html>
<html>
	<head>
		<title>Chatterbox</title>
		<script>
			// XMLHttpRequest
			var xhr=null;
			
			function sendchat()
			{
				//XMLHttpRequest object
				try
				{
					xhr = new XMLHttpRequest();
				}
				catch(e)
				{
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				if(xhr==null)
				{
					alert("Ajax not supported by the browser");
					return;
				}
				
				var chat = document.getElementById("chat").value;
				
				var url = "chat.php?chat=" + chat;
				
				xhr.onreadystatechange = function()
				{
					if(xhr.readyState == 4)
					{
						if(xhr.status == 200)
						{
							var div = document.createElement("div");
							var text = document.createTextNode(chat);
							div.appendChild(text);
							document.getElementById("chatarea").appendChild(div);
							document.getElementById("chat").value = "";
						}
						else
						{
							alert("Error with Ajax call!");
						}
					}
				}
				
				xhr.open("GET", url, true);
				xhr.send(null);
				
			}
		</script>
	</head>
	
	<body>
		<form onsubmit="sendchat(); return false;">
			<input type="text" id="chat">
			<input type="submit" value='Go'>
		</form>
		<div id="chatarea"></div>
	</body>
</html>
