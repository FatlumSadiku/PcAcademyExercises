
// Cat class that extends Pet class
public class Cat extends Pet {
    private String furColor; // private attribute
 
    // constructor containing attributes of the parent class and the class
   
    public Cat(String name, String species, int age, String furColor) {
       super(name, species, age);
       this.furColor = furColor;
    }
    // method to get cat details
   
    public String getDetails() {
       return super.toString() + "\nFur color: " + this.furColor;
    }
 }
 
 
 