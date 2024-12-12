
// Dog class that extends Pet class
class Dog extends Pet{
    private String race;
   
  // constructor containing attributes of the parent class and the class
   public Dog(String name, String species, int age, String race) {
      super(name, species, age);
      this.race = race;
   }
   // metodo per ottenere i dettagli del cane(da classe padre) + la razza(classe figlio)
  // method to get details of the dog

   public String getDetails() {
      return super.toString() + "\nRace: " + this.race;
   }

}
