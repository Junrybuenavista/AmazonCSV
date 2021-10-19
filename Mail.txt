
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.text.DecimalFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Properties;
import javax.mail.*;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;




public class SendEmail {

Statement st;
ResultSet rs;
public SendEmail(String lastweek,String today) throws Exception
{		
		
		setDataBaseConnection();
	 	//final String username = "ap-nbv@nbvresorts.com";
	    //final String password = "Villagelife2020!+";
	
	    final String username = "buenavistajunry@gmail.com";
        final String password = "Killingmesoftly2";

	    Properties props = new Properties();
	    props.put("mail.smtp.ssl.protocols", "TLSv1.2");
	    props.put("mail.smtp.auth", true);
	    props.put("mail.smtp.starttls.enable", true);
	    props.put("mail.smtp.host", "smtp.gmail.com");
	    props.put("mail.smtp.port", "587");

	    Session session = Session.getInstance(props,
	            new javax.mail.Authenticator() {
	                protected PasswordAuthentication getPasswordAuthentication() {
	                    return new PasswordAuthentication(username, password);
	                }
	            });
	  
	    try {
	        Message message = new MimeMessage(session);
	        message.setFrom(new InternetAddress("buenavistajunry@gmail.com"));
	        message.setRecipients(Message.RecipientType.TO,
	        		InternetAddress.parse("junrybuenavista@yahoo.com"));
	        message.setSubject("Testing Subject");
	        
	       
	      
	        SimpleDateFormat dateformat = new SimpleDateFormat("dd/MM/yyyy");
	        DecimalFormat df=new DecimalFormat("#.##");
	        
	        String Htmldoc="<style>"
	        		+ "table, td, th {"
	        		+ "  border: 1px solid black;"
	        		+ "}"
	        		+ ""
	        		+ "table {"
	        		+ "  border-collapse: collapse;"
	        		+ "  width: 100%;"
	        		+ "}"
	        		+ ""
	        		+ "td,th {"
	        		+ "  text-align: center;"
	        		+ "}"
	        		+ "</style>";
	        
	        
	        Htmldoc+="<center><h1>Amazon Sales Tax Report</h1></center>";
	        Htmldoc+="<center><h3>Date:"+dateformat.format(new Date())+"</h3></center>";
	        	
	        Htmldoc+="<table>"
	        		+ "  <tr>"
	        		+ "    <th>Order Date</th>"
	        		+ "	<th>Location</th>"
	        		+ "    <th>Order Number</th>"
	        		+ "    <th>Item Name</th>"
	        		+ "	<th>Item Price</th>"
	        		+ "	<th>QTY</th>"
	        		+ "	<th>Estimated Tax</th>"
	        		+ "  </tr>";
	        
	        rs=st.executeQuery("SELECT Order_Date, Order_ID, Title, Item_Subtotal, Item_Quantity, Location FROM amazon_data WHERE (Item_Tax = '' OR Item_Tax = '0') AND Order_Date between '"+lastweek+"' and '"+today+"'  ORDER BY Order_Date");
		    while(rs.next()){
		    	
		    	double total = rs.getDouble("Item_Subtotal");
		    	int quantity = rs.getInt("Item_Quantity");
		    	double price = total/quantity;
		    	double estTax= total * 0.07;
		    	 Htmldoc+=" \r\n"
		    	 		+ "			<tr>\r\n"
		    	 		+ "			<td>"+rs.getString("Order_date")+"</td>\r\n"
		    	 		+ "			<td>"+rs.getString("Location")+"</td>\r\n"
		    	 		+ "			<td>"+rs.getString("Order_ID")+"</td>\r\n"
		    	 		+ "			<td>"+rs.getString("Title")+"</td>\r\n"
		    	 		+ "			<td>"+df.format(price)+"</td>\r\n"
		    	 		+ "			<td>"+quantity+"</td>\r\n"
		    	 		+ "			<td>"+df.format(estTax)+"</td>\r\n"
		    	 		+ "		  </tr>";
		    }
		    Htmldoc+="</table>";
	        message.setContent(Htmldoc,"text/html" );
	        
	        Transport.send(message);
	        
	        System.out.println("Email sent!");
	  
		    } 
		    catch (MessagingException e) {
		        e.printStackTrace();
		        System.out.println("Sending Mail waiting:");
		        Thread.sleep(1000);
		    }
	    
	}
public void setDataBaseConnection() {
	try{  
		Class.forName("com.mysql.jdbc.Driver");  
		Connection con=DriverManager.getConnection(  
		"jdbc:mysql://localhost:3306/amazon","root","");  	
		st=con.createStatement();
		
	   }catch(Exception e){ e.printStackTrace();}  
}

public static void main(String[] args)throws Exception {
	new SendEmail("2021-10-9","2021-10-16");
			
  }
}