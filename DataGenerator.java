
import java.io.File;
import java.io.FileInputStream;
import java.sql.*;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.Random;

public class DataGenerator {

	static SimpleDateFormat fmt = new SimpleDateFormat("yyyy-MM-dd");
	static String folderPathCats = new File("cats").getAbsolutePath();
	static String folderPathDogs = new File("dogs").getAbsolutePath();
	static String folderPathProfiles = new File("profiles").getAbsolutePath();

	private static int generateRandomNumber(int min, int max) {
		Random random = new Random();
		return random.nextInt(max - min + 1) + min;
	}

	public static ArrayList<String> getRandomDates(int numberOfDates) {
		ArrayList<String> dates = new ArrayList<String>();
		for (int i = 1; i <= numberOfDates; i++) {
			Calendar calendar = new GregorianCalendar();

			int year = generateRandomNumber(2020, 2024);
			calendar.set(Calendar.YEAR, year);

			int month = generateRandomNumber(0, 11);
			calendar.set(Calendar.MONTH, month);

			int day = generateRandomNumber(1, 31);
			calendar.set(Calendar.DAY_OF_MONTH, day);

			fmt.setCalendar(calendar);
			dates.add(fmt.format(calendar.getTime()));
		}
		return dates;
	}

	public static void main(String args[]) {
		try {
			// Loads the class "oracle.jdbc.driver.OracleDriver" into the memory
			Class.forName("oracle.jdbc.driver.OracleDriver");

			// Connection details
			String database = "jdbc:oracle:thin:@oracle19.cs.univie.ac.at:1521:orclcdb";
			String user = "a12130179";
			String pass = ",fhcer21";

			// Establish a connection to the database
			Connection con = DriverManager.getConnection(database, user, pass);
			Statement stmt = con.createStatement();
		

			int numberOfDoctors = 100;
			int numberOfHeim = 50;
			int numberOfKunden = 1000;
			int numberOfHunde = 500;
			int numberOfKatze = 500;
			int numberOfKollegen = 50;
			int numberOfBehandlungen = 1000;


			
			generateDoctors(numberOfDoctors, stmt);
			generateKollegen(numberOfKollegen,stmt);
			generateHeims(numberOfHeim, stmt);
			generateKunden(numberOfKunden, stmt);
			generateProfile(numberOfKunden, stmt, con);
			generateStrassentiere(numberOfKunden, stmt, con);
			generateHunde(numberOfHunde, stmt);
			generateKatze(numberOfKatze, stmt);
			generateBehandlung(numberOfBehandlungen, stmt);
			
			
			stmt.close();
			con.close();
		} catch (Exception e) {
			System.err.println(e.toString());
		}
	}

	// _____________________________________________________________________________________________________________________
	public static void generateDoctors(int numberOfDoctors, Statement stmt) throws SQLException {
		try {
			ArrayList<String> names = new ArrayList<>(Arrays.asList("Lisa Müller", "Alicia Petri", "Susan Me", "Maria Tores", 
					"Stella Schwaiger", "Johanna Neuner", "Grace Fillman", "Max Müller", "Leo Caprio", "Johny Depp", "Johaness Fleisher", 
					"David Abasic"));
			for (int i = 1; i <= numberOfDoctors; i++) {
				int nameIndex = generateRandomNumber(0, names.size() - 1);
				String insertSql = "INSERT INTO TIERARZT (NAME, LIZENZNUMMER, HANDYNUMMER) VALUES ('" + names.get(nameIndex) + "'," + i
						+ ",'+45 1233" + i + "')";
				int rowsAffected = stmt.executeUpdate(insertSql);
			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet arzt = stmt.executeQuery("SELECT COUNT(*) FROM TIERARZT");
		if (arzt.next()) {
			int count = arzt.getInt(1);
			System.out.println("Number of datasets in ARZT: " + count);
		}
		arzt.close();
	}

	public static void generateKollegen(int numberOfKollegen, Statement stmt) throws SQLException {
		try {
			for (int i = 1; i <= numberOfKollegen; i++) {
				String insertSql = "INSERT INTO KOLLEGEN (LIZENZNUMMER1, LIZENZNUMMER2) VALUES ('" + i + "','"
						+ (i + 50) + "')";
				int rowsAffected = stmt.executeUpdate(insertSql);
			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet kollegen = stmt.executeQuery("SELECT COUNT(*) FROM KOLLEGEN");
		if (kollegen.next()) {
			int count = kollegen.getInt(1);
			System.out.println("Number of datasets in Kollegen: " + count);
		}
		kollegen.close();
	}

	public static void generateHeims(int numberOfHeim, Statement stmt) throws SQLException {
		try {
			ArrayList<String> names = new ArrayList<>(Arrays.asList("Your best friend", "TierQuartier", "Heim Sonnenberg", "Bratislava Heim",
					"Zweite Chance", "Vier Pfoten", "Your Luck", "Your Love", "Your Happyness", "Cat is your best friend", "You need a cat"));
			for (int i = 1; i <= numberOfHeim; i++) {
				int tierHeimIndex = generateRandomNumber(0, names.size() - 1);
				String insertSql = "INSERT INTO TIERHEIM (NAME,ADRESSE) VALUES ('" + names.get(tierHeimIndex) + "', 'Adresse" + i
						+ "')";
				int rowsAffected = stmt.executeUpdate(insertSql);
			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet heim = stmt.executeQuery("SELECT COUNT(*) FROM TIERHEIM");
		if (heim.next()) {
			int count = heim.getInt(1);
			System.out.println("Number of datasets in TIERHEIM: " + count);
		}
		heim.close();
	}

	public static void generateKunden(int numberOfKunde, Statement stmt) throws SQLException {
		try {

			ArrayList<String> names = new ArrayList<>(Arrays.asList("Lisa Müller", "Alicia Petri", "Susan Me", "Maria Tores", 
					"Stella Schwaiger", "Johanna Neuner", "Grace Fillman", "Max Müller", "Leo Caprio", "Johny Depp", "Johaness Fleisher", 
					"David Abasic"));
			
			for (int i = 1; i <= numberOfKunde; i++) {
				String country;
				switch (i % 6) {
				case 0:
					country = "Slowakei";
					break;
				case 1:
					country = "Italien";
					break;
				case 2:
					country = "Bulgarien";
					break;
				case 3:
					country = "Portugal";
					break;
				case 4:
					country = "Poland";
					break;
				default:
					country = "Ungarn";
					break;

				}
				String stadt;
				String strasse;
				String plz;
				if (country == "Slowakei") {
					stadt = "Bratislava";
					strasse = "Strasse in Bratislava";
					plz = "81101";
				} else if (country == "Italien") {
					stadt = "Rom";
					strasse = "Strasse in Rom";
					plz = "00186";

				} else if (country == "Bulgarien") {
					stadt = "Sofia";
					strasse = "Strasse in Sofia";
					plz = "001578";

				} else if (country == "Poland") {
					stadt = "Warschau";
					strasse = "Strasse in Warschau";
					plz = "045884";

				} else {
					stadt = "Budapest";
					strasse = "Strasse in Budapest";
					plz = "00876";

				}
				int nameIndex = generateRandomNumber(0, names.size() - 1);
				String insertSql = "INSERT INTO KUNDE (NAME, LAND, STADT, PLZ, STRASSE, HAUSNUMMER, HANDYNUMMER) VALUES ('"
						+ names.get(nameIndex) + "', '" + country + "', '" + stadt + "', " + plz + ", '" + strasse + "'," + i
						+ ", '+45 1233" + i + "')";
				int rowsAffected = stmt.executeUpdate(insertSql);

			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet kunde = stmt.executeQuery("SELECT COUNT(*) FROM KUNDE");
		if (kunde.next()) {
			int count = kunde.getInt(1);
			System.out.println("Number of datasets in Kunde: " + count);
		}
		kunde.close();
	}

	public static void generateProfile(int numberOfProfile, Statement stmt, Connection con) throws SQLException {
		try {
			ArrayList<String> femaleNames = new ArrayList<>(Arrays.asList("Lisa Müller", "Alicia Petri", "Susan Me", "Maria Tores", 
					"Stella Schwaiger", "Johanna Neuner", "Grace Fillman", "Arwen Elf", "Sofia Wolf"));
			
			ArrayList<String> maleNames = new ArrayList<>(Arrays.asList("Max Müller", "Leo Caprio", "Johny Depp", "Johaness Fleisher", 
					"David Abasic", "Peter Großmann", "Stephan Heurig", "Chris Bloomberg", "Bilbo Beggins", "Frodo Beggins"));
			for (int i = 1; i <= numberOfProfile; i++) {
				int picture = generateRandomNumber(1,2);
				
				String name;
			
				if (picture == 1)
					name = maleNames.get(generateRandomNumber(0, maleNames.size() - 1));
				else 
					name = femaleNames.get(generateRandomNumber(0, femaleNames.size() - 1));


				String insertSql = "INSERT INTO PROFIL (NAME, PERSONALID, HANDYNUMMER, EMAIL, BILD) VALUES ('" + name + "','"
						+ i + "','+45 1233" + i + "','name" + i + ",@gmail.com',?)";				
				
				String picturePath = new File(folderPathProfiles, picture + ".jpg").getAbsolutePath();
			    FileInputStream fin = new FileInputStream(picturePath);
			    PreparedStatement pstmt = con.prepareStatement(insertSql);
			    pstmt.setBinaryStream(1, fin);
				pstmt.execute();
				pstmt.close();
				fin.close();

			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet profil = stmt.executeQuery("SELECT COUNT(*) FROM PROFIL");
		if (profil.next()) {
			int count = profil.getInt(1);
			System.out.println("Number of datasets in Profil: " + count);
		}
		profil.close();

	}

	public static void generateStrassentiere(int numberOfStrassentiere, Statement stmt, Connection con) throws SQLException {
		try {
			ArrayList<String> dates = getRandomDates(numberOfStrassentiere);
			ArrayList<String> names = new ArrayList<>(Arrays.asList("Minka", "Milka","Pony","Bonja","Mufasa","Bilbo","Adam","Ginger",
					"Susi","Pou-Pou","Pandi","Budi","Mimi","Brot","Cheri","Lili","Stella","Garfild","Lobster","Greg"));
			
			int numberOfDogs = numberOfStrassentiere / 2;
			int numberOfCats = numberOfStrassentiere - numberOfDogs;
			for (int i = 1; i <= numberOfStrassentiere; i++) {
				int nN = generateRandomNumber(0, names.size() - 1);
				String name = names.get(nN);
				String insertSql = "INSERT INTO STRASSENTIER (TIERID, NAME, PERSONALID, BILD, ABHOLDATUM,TIER_ALTER) VALUES ("
						+ i + ",'"+name+ "'," + i + ",?" + ",to_date('" + dates.get(i - 1) + "','YYYY-MM-DD')," + i % 20
						+ ")";
				
				int picture = generateRandomNumber(1,10);
				
				String folderPath = "";
				if (i <= numberOfDogs)
					folderPath = folderPathDogs;
				else
					folderPath = folderPathCats;
				
				String picturePath = new File(folderPath, picture + ".jpg").getAbsolutePath();
			    FileInputStream fin = new FileInputStream(picturePath);
			    PreparedStatement pstmt = con.prepareStatement(insertSql);
			    pstmt.setBinaryStream(1, fin);
				pstmt.execute();
				pstmt.close();
				fin.close();
				
			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet strassentier = stmt.executeQuery("SELECT COUNT(*) FROM STRASSENTIER");
		if (strassentier.next()) {
			int count = strassentier.getInt(1);
			System.out.println("Number of datasets in STRASSENTIER: " + count);
		}
		strassentier.close();

	}

	public static void generateHunde(int numberOfHunde, Statement stmt) throws SQLException {

		try {
			for (int i = 1; i <= numberOfHunde; i++) {
				int gewicht = generateRandomNumber(1, 40);
				String insertSql = "INSERT INTO HUND (TIERID, HUNDINDEX, GEWICHT) VALUES (" + i + "," + (i + 100) + ","
						+ gewicht + ")";
				int rowsAffected = stmt.executeUpdate(insertSql);

			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet hunde = stmt.executeQuery("SELECT COUNT(*) FROM Hund");
		if (hunde.next()) {
			int count = hunde.getInt(1);
			System.out.println("Number of datasets in Hunden: " + count);
		}
		hunde.close();

	}

	public static void generateKatze(int numberOfKatze, Statement stmt) throws SQLException {

		try {
			for (int i = 1; i <= numberOfKatze; i++) {
				int hauskatze = generateRandomNumber(0, 2);
				String haus;
				if (hauskatze == 1) {
					haus = "darf mit Besitzer draussen sein";
				} else if (hauskatze == 2) {
					haus = "darf allein draussen sein";
				} else {
					haus = "Hauskatze";
				}
				String insertSql = "INSERT INTO KATZE (TIERID, KATZENINDEX, HAUSKATZE) VALUES (" + (i + 500) + ","
						+ (i + 200) + ",'" + haus + "')";
				int rowsAffected = stmt.executeUpdate(insertSql);

			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet katze = stmt.executeQuery("SELECT COUNT(*) FROM Katze");
		if (katze.next()) {
			int count = katze.getInt(1);
			System.out.println("Number of datasets in Katzen: " + count);
		}
		katze.close();

	}

	public static void generateBehandlung(int numberOfBehandlungen, Statement stmt) throws SQLException {
		try {
			int arzt = 0;
			int heim = 0;
			for (int i = 0; i < numberOfBehandlungen; i++) {

				if ((i % 10) == 0)
					arzt++;

				if ((i % 20) == 0)
					heim++;

				String insertSql = "INSERT INTO BEHANDLUNG (TIERID, LIZENZNUMMER,HEIMID) VALUES (" + (i + 1) + ","
						+ arzt + "," + heim + ")";
				int rowsAffected = stmt.executeUpdate(insertSql);
			}

		} catch (Exception e) {
			System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
		}

		ResultSet behandlung = stmt.executeQuery("SELECT COUNT(*) FROM BEHANDLUNG");
		if (behandlung.next()) {
			int count = behandlung.getInt(1);
			System.out.println("Number of datasets in Behandung: " + count);
		}
		behandlung.close();
	}

}
