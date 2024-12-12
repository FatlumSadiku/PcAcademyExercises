
// Abstract class Pet that implements Animal interface
abstract class Pet implements Animal {
    // private atrributes
    private String name;
    private String species;
    private int age;
 
    // constructor
    public Pet(String name, String species, int age) {
       this.name = name;
       this.species = species;
       this.age = age;
    }
    // method to get animal name
    public String getName() {
       return this.name;
    }
    // method to get animal species
    public String getSpecies() {
       return this.species;
    }
    // method to get animal age
    public int getAge() {
       return this.age;
    }
    public abstract String getDetails();
    // method to get animal details
    public String toString() {
       return "Name: " + this.name + "\nSpecies: " + this.species + "\nAge: " + this.age;
    }
 
 }
 