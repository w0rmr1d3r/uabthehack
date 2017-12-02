package pdfmaker;
import java.sql.*; // standard JDBC programs
import java.util.ArrayList;
import java.util.List;
import java.util.Properties;

import javax.script.ScriptException;
import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Font;
import com.itextpdf.text.PageSize;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;

import java.io.*;


public class pdfmaker {
	
	private static Connection connectDB() throws SQLException, ClassNotFoundException {
		Connection conn = null;
		Properties connectionProps = new Properties();
		Class.forName("org.mariadb.jdbc.Driver");
		String URL = "127.0.0.1";
		String USER = "uabTheHack";
		String PSWD = "uabTheHack";
		String DBNAME = "uabTheHack";
		connectionProps.put("user", USER);
		connectionProps.put("password", PSWD);
		
		conn = DriverManager.getConnection("jdbc:mariadb://" + URL + "/"+DBNAME,connectionProps);
		
		
		return conn;
		
	}
	private static List<String> getUsers(Connection conn, String group, String date) throws ScriptException, IOException, NoSuchMethodException, SQLException {
		//ScriptEngineManager manager = new ScriptEngineManager();
		//ScriptEngine engine = manager.getEngineByName("JavaScript");
		//String path = "~/mlh/uabthehack/js/custom_js.js";
		//engine.eval(Files.newBufferedReader(Paths.get(path),StandardCharsets.UTF_8));
		//Invocable inv = (Invocable) engine;
		//inv.invokeFunction("getXMLHTTP()","");
		//inv.seeGroup();
		List<String> userInfo= new ArrayList<String>();
		Statement stmt = conn.createStatement();
		String query = "select DISTINCT persona.id, Assistance.data, Assistance.assistance_type, persona.name, persona.lastname from Assistance INNER join persona on Assistance.persona_id = persona.id AND persona.id in (select persona_id from grupos_has_persones where grupos_has_persones.grupos_id = (Select id from grupos where name = \"" +group + "\"))AND Assistance.data = \""+date+"\"";
		ResultSet result = stmt.executeQuery(query);
		
		while (result.next()) {
			 userInfo.add(result.getString("name") + "," + result.getString("lastname") + "," + result.getString("assistance_type"));
			 
		}
		return userInfo;
	}
	public static void makePdf(String group, String date) throws IOException, DocumentException, ClassNotFoundException, SQLException, NoSuchMethodException, ScriptException {
		List<String> userInfo = null;
		Connection conn = connectDB();
		userInfo = getUsers(conn, group, date);
		String fileName = "tmp.pdf";
		Document doc = new Document(PageSize.A4, 60f,60f,80f,0f);
		PdfWriter.getInstance(doc, new FileOutputStream(new File(fileName)));
		doc.open();
		
		Font headerFont = new Font();
		headerFont.setStyle(Font.BOLD);
		headerFont.setSize(12f);
		PdfPTable table = new PdfPTable(3);
		
		table.addCell(new Paragraph("Group:    "+group,headerFont));
		table.addCell(new Paragraph("Date: "+ date,headerFont));
		table.completeRow();
		
		
		table.addCell(new Paragraph("Name",headerFont));
		table.addCell(new Paragraph("LastName",headerFont));
		table.addCell(new Paragraph("Assistance",headerFont));
			
		
		for (String user : userInfo) {
			String[] infoS = user.split(",");
			for (String info : infoS) {
				table.addCell(info);
			}
			table.completeRow();
		}
		doc.add(table);
		doc.close();
		
		
	}
	
	public static void main(String[] args) throws IOException, DocumentException, ClassNotFoundException, SQLException, NoSuchMethodException, ScriptException {
		makePdf("hack", "12/12/2017");
	}

}
