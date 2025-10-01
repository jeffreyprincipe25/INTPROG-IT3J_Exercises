import jakarta.servlet.*;
import jakarta.servlet.http.*;
import java.io.IOException;
import java.util.*;

public class TeamServlet extends HttpServlet {
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        List<TeamMember> team = new ArrayList<>();
        team.add(new TeamMember("Jeffrey Principe", "Frontend Developer",
            "Specializes in creating interactive and visually stunning websites. Passionate about responsive design and user experience.",
            "+63 912 345 6789", "jeffrey@example.com", "www.jeffreyprincipe.dev", "image/image1.jpg"));

        team.add(new TeamMember("Justin De lara", "Backend Developer",
            "Expert in server-side technologies and database management. Loves building efficient APIs and secure systems.",
            "+63 923 456 7890", "justin@example.com", "www.justindelara.dev", "image/image2.jpg"));

        team.add(new TeamMember("Jaypee Miranda", "UI/UX Designer",
            "Creates user-friendly interfaces with eye-catching visuals. Skilled in Adobe XD, Figma, and modern web design trends.",
            "+63 934 567 8901", "jaypee@example.com", "www.jaypeemiranda.design", "image/image3.jpg"));

        team.add(new TeamMember("Ralp Owen Castillo", "Project Manager",
            "Manages projects from start to finish, ensuring smooth communication, teamwork, and on-time delivery.",
            "+63 945 678 9012", "ralp@example.com", "www.ralpowenpm.com", "image/image4.jpg"));

        request.setAttribute("teamList", team);
        RequestDispatcher dispatcher = request.getRequestDispatcher("team.jsp");
        dispatcher.forward(request, response);
    }
}

// Define the TeamMember class if not already defined
class TeamMember {
    private String name;
    private String role;
    private String description;
    private String phone;
    private String email;
    private String website;
    private String imagePath;

    public TeamMember(String name, String role, String description, String phone, String email, String website, String imagePath) {
        this.name = name;
        this.role = role;
        this.description = description;
        this.phone = phone;
        this.email = email;
        this.website = website;
        this.imagePath = imagePath;
    }

    // Getters (add setters if needed)
    public String getName() { return name; }
    public String getRole() { return role; }
    public String getDescription() { return description; }
    public String getPhone() { return phone; }
    public String getEmail() { return email; }
    public String getWebsite() { return website; }
    public String getImagePath() { return imagePath; }
}
