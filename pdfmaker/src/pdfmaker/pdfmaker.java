package pdfmaker;
import java.sql.*; // standard JDBC programs

import java.math.*;
import java.awt.Font;
import com.itextpdf.*;
import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Element;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.pdf.PdfWriter;

import java.io.*;


public class pdfmaker {
	
	private static Connection connectDB() throws SQLException, ClassNotFoundException {
		String URL = "localhost";
		String USER = "";
		String PSWD = "";
		Driver dbDriver = new oracle.jdbc.driver.OracleDriver();
		DriverManager.registerDriver( dbDriver );
		
		Connection conn = DriverManager.getConnection(URL, USER, PSWD);
		return conn;
		
	}
	private static void getUsers() {
		
	}
	public static void makePdf(String data) throws IOException, DocumentException {
		
		String fileName = "tmp.pdf";
		Document doc = new Document();
		PdfWriter.getInstance(doc, new FileOutputStream(new File(fileName)));
		doc.open();
		Paragraph p = new Paragraph();
		p.add(data);
		p.setAlignment(Element.ALIGN_CENTER);
		doc.add(p);
		doc.close();
		
		
	}
	
	public static void main(String[] args) throws IOException, DocumentException {
		makePdf("Hello World");

	}

}
