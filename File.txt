import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.List;
import java.util.stream.Collectors;
import java.util.stream.Stream;

import javax.swing.JTextArea;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;

public class FindFileByExtension extends Thread{
	WebDriver driver;
	Statement stmt;
	JTextArea area;
	String emailToSend;
	Amazon_Bot bot;
	SimpleDateFormat dateFormat;
	boolean monitor;
    public static void main(String[] args) {

    }
    public FindFileByExtension(WebDriver driver,JTextArea area,String emailToSend,Amazon_Bot bot) {
    	this.driver=driver;
    	this.area=area;
    	this.emailToSend=emailToSend;
    	this.bot=bot;
    	setDataBaseConnection();
    	dateFormat = new SimpleDateFormat("yyyy-MM-dd");
    }
   
    
    public void run() {
    	
    	
    	while(true) 
    	{	
    		   
		    	try {
		    		
		    		Thread.sleep(1000);
		            List<String> files = findFiles(Paths.get("C:"+File.separator+"xampp"+File.separator+"mysql"+File.separator+"data"+File.separator+"amazon"), "csv");            
		            
		            File f=new File(files.get(0));
		            //File fileName = new File("D:"+File.separator+"xammmp7.4"+File.separator+"mysql"+File.separator+"data"+File.separator+"amazon"+File.separator+"Amazon_data");    
					 f.renameTo(new File("C:"+File.separator+"xampp"+File.separator+"mysql"+File.separator+"data"+File.separator+"amazon"+File.separator+"Amazon_data.csv"));			            
					 System.out.println("File renamed");
					 stmt.execute("DELETE FROM `amazon_data`");
					 
					 
					 stmt.execute("LOAD DATA INFILE 'Amazon_data.csv'\r\n"
					 		+ "INTO TABLE amazon_data\r\n"
					 		+ "FIELDS TERMINATED BY ',' ENCLOSED BY '\"'\r\n"
					 		+ "LINES TERMINATED BY '\\n'\r\n"
					 		+ "IGNORE 1 ROWS\r\n"
					 		+ "(@Order_Date ,\r\n"
					 		+ "Order_ID ,\r\n"
					 		+ "Account_Group ,\r\n"
					 		+ "PO_Number ,\r\n"
					 		+ "Order_Quantity ,\r\n"
					 		+ "Currency ,\r\n"
					 		+ "Order_Subtotal ,\r\n"
					 		+ "Order_Shipping_Handling ,\r\n"
					 		+ "Order_Promotion ,\r\n"
					 		+ "Order_Tax ,\r\n"
					 		+ "Order_Net_Total ,\r\n"
					 		+ "Order_Status ,\r\n"
					 		+ "Approver ,\r\n"
					 		+ "Account_User ,\r\n"
					 		+ "Account_User_Email ,\r\n"
					 		+ "Invoice_Status ,\r\n"
					 		+ "Total_Amount ,\r\n"
					 		+ "Invoice_Due_Amount ,\r\n"
					 		+ "Invoice_Issue_Date ,\r\n"
					 		+ "Invoice_Due_Date ,\r\n"
					 		+ "Payment_Reference_ID ,\r\n"
					 		+ "Payment_Date ,\r\n"
					 		+ "Payment_Amount ,\r\n"
					 		+ "Payment_Instrument_Type ,\r\n"
					 		+ "Payment_Identifier ,\r\n"
					 		+ "Amazon_Internal_Product_Category ,\r\n"
					 		+ "ASIN ,\r\n"
					 		+ "Title ,\r\n"
					 		+ "UNSPSC ,\r\n"
					 		+ "Segment ,\r\n"
					 		+ "Family ,\r\n"
					 		+ "Class ,\r\n"
					 		+ "Commodity ,\r\n"
					 		+ "Brand_Code ,\r\n"
					 		+ "Brand ,\r\n"
					 		+ "Manufacturer ,\r\n"
					 		+ "National_Stock_Number ,\r\n"
					 		+ "Item_model_number ,\r\n"
					 		+ "Part_number ,\r\n"
					 		+ "Product_Condition ,\r\n"
					 		+ "Company_Compliance ,\r\n"
					 		+ "Listed_PPU ,\r\n"
					 		+ "Purchase_PPU ,\r\n"
					 		+ "Item_Quantity ,\r\n"
					 		+ "Item_Subtotal ,\r\n"
					 		+ "Item_Shipping_Handling ,\r\n"
					 		+ "Item_Promotion ,\r\n"
					 		+ "Item_Tax ,\r\n"
					 		+ "Item_Net_Total ,\r\n"
					 		+ "PO_Line_Item_Id ,\r\n"
					 		+ "Tax_Exemption_Applied ,\r\n"
					 		+ "Tax_Exemption_Type ,\r\n"
					 		+ "Tax_Exemption_Opt_Out ,\r\n"
					 		+ "Discount_Program ,\r\n"
					 		+ "Pricing_Discount_applied_dollar ,\r\n"
					 		+ "Pricing_Discount_applied_percentage ,\r\n"
					 		+ "GL_Code ,\r\n"
					 		+ "Department ,\r\n"
					 		+ "Cost_Center ,\r\n"
					 		+ "Project_Code ,\r\n"
					 		+ "Location ,\r\n"
					 		+ "Custom_Field_1 ,\r\n"
					 		+ "Seller_Name ,\r\n"
					 		+ "Seller_Credentials ,\r\n"
					 		+ "Seller_City ,\r\n"
					 		+ "Seller_State ,\r\n"
					 		+ "Seller_ZipCode)\r\n"
					 		+ "SET Order_Date = STR_TO_DATE(@Order_Date, '%m/%d/%Y');");
					    
					 	SimpleDateFormat dateformat = new SimpleDateFormat("yyyy-MM-dd");
					 	Date date = new Date();
				        String todate = dateformat.format(date);

				        Calendar cal = Calendar.getInstance();
				        cal.add(Calendar.DATE, -7);
				        Date todate1 = cal.getTime();    
				        String fromdate = dateformat.format(todate1);
					 
					 //driver.get("http://localhost/amazonCSV/query.php?currentday="+todate+"&lastweek="+fromdate);
					 area.append("Sending to email\n");
					 new SendEmail(fromdate,todate);
					 Thread.sleep(4000);
					 stmt.execute("DELETE FROM `amazon_data`");
					 Path fileToDeletePath = Paths.get("C:"+File.separator+"xampp"+File.separator+"mysql"+File.separator+"data"+File.separator+"amazon"+File.separator+"Amazon_data.csv");
					 Files.delete(fileToDeletePath);
					 
					 area.append("process complete\n");
					 stmt.execute("INSERT INTO updates VALUES ('Done','"+dateFormat.format(new Date())+"')");
					
					 Thread.sleep(2000);
					 bot.resume();
					 break;
		        } catch (IOException e) {
		            e.printStackTrace();
		        }
		    	catch (IndexOutOfBoundsException ee) {
		           System.out.println("Waiting for file");
		        }
		    	catch (InterruptedException eee) {
		            eee.printStackTrace();
		        }
		    	catch (SQLException eeee) {
		            eeee.printStackTrace();
		        }
		    	catch(Exception ee) {ee.printStackTrace();}
    	}
    }
    
    public void setDataBaseConnection() {
		try{  
			Class.forName("com.mysql.jdbc.Driver");  
			Connection con=DriverManager.getConnection(  
			"jdbc:mysql://localhost:3306/amazon","root","");  	
			stmt=con.createStatement();
			
		   }catch(Exception e){ e.printStackTrace();}  
	}
    
    public static List<String> findFiles(Path path, String fileExtension)
        throws IOException {

        if (!Files.isDirectory(path)) {
            throw new IllegalArgumentException("Path must be a directory!");
        }

        List<String> result;

        try (Stream<Path> walk = Files.walk(path)) {
            result = walk
                    .filter(p -> !Files.isDirectory(p))
                    // this is a path, not string,
                    // this only test if path end with a certain path
                    //.filter(p -> p.endsWith(fileExtension))
                    // convert path to string first
                    .map(p -> p.toString().toLowerCase())
                    .filter(f -> f.endsWith(fileExtension))
                    .collect(Collectors.toList());
        }

        return result;
    }

}